<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/InzendingenDAO.php';
require_once __DIR__ . '/../dao/ScoutsDAO.php';
require_once __DIR__ . '/../dao/OpdrachtenDAO.php';
require_once __DIR__ . '/../dao/MonthsDAO.php';

class InzendingenController extends Controller {

  function __construct() {
    $this->InzendingenDAO = new InzendingenDAO();
    $this->ScoutsDAO = new ScoutsDAO();
    $this->OpdrachtenDAO = new OpdrachtenDAO();
    $this->MonthsDAO = new MonthsDAO();


  }

  public function index() {
    $inzendingen = $this->InzendingenDAO->selectAllApproved();
    $this->set('inzendingen', $inzendingen);
    $maanden = $this->MonthsDAO->selectAll();
    $this->set('maanden', $maanden);
  }

   public function upload() {
  }

  public function uploadVideo() {
    $scouts = $this->ScoutsDAO->selectAll();
    $opdrachten = $this->OpdrachtenDAO->selectAll();

    if(!empty($_POST['video'])) {
      $this->_handleAddVideo();
    }
    $this->set('opdrachten', $opdrachten);
    $this->set('scouts', $scouts);
  }

  public function uploadFoto() {
    $scouts = $this->ScoutsDAO->selectAll();
    $opdrachten = $this->OpdrachtenDAO->selectAll();
    
    if(!empty($_FILES['image'])){
      $this->_handleAddPhoto();
    }

    $this->set('opdrachten', $opdrachten);
    $this->set('scouts', $scouts);
  }

  public function scoreboard() {
    $inzendingen = $this->InzendingenDAO->SelectAll();
    $scouts = $this->ScoutsDAO->selectAll();
    $totalPoints = [];
    foreach($scouts as $scout){
      $inzendingenScouts = $this->InzendingenDAO->selectAllPointsPerScouts($scout["scouts"]);
      $totalPoints[$scout["scouts"]]  = 0;
      foreach($inzendingenScouts as $i){
        $key = $i["scouts"];
        $totalPoints[$key] = $totalPoints[$key] + $i["punten"] + $i["extraPoints"];
      }
    }
    print_r($totalPoints);
    arsort($totalPoints);

    $this->set('totalPoints', $totalPoints);
  }

 
private function _handleAddVideo(){
  $data = array_merge($_POST, array(
    'created' => date('Y-m-d H:i:s'),
    'image' => '',
    'video' => $_POST["video"],
    'videoPlatform' => 'will be set later',
    'embed' => 'will be set later',
    'approved' => 1,
    'extraPoints' => 0,
    'opdracht_id' => $_POST["opdracht"],
    'scouts_id' => $_POST["scouts"],
    'commentaar' => $_POST["commentaar"]

));
  if(strstr($_POST['video'], 'youtube')){
    $embed = explode("v=",$_POST['video'] );
    $data['videoPlatform'] = 'youtube';
    $data['embed'] = $embed[1];
  } else if (strstr($_POST['video'], 'vimeo')){
    $first = explode("vimeo.com/",$_POST['video'] );
    $embed = explode("?fbclid=",$first[1] );

    $data['videoPlatform'] = 'vimeo';
    $data['embed'] = $embed[0];

  } else {
    echo "it's something else";
  }

  print_r($data);

  $errors = $this->InzendingenDAO->validate($data);
  print_r($errors);
  if (empty($_POST['video']) || !empty($_POST['video']['error'])) {
    print_r("test");
    $errors['video'] = 'Gelieve een bestand te selecteren';
  }


  $insertedVideo = $this->InzendingenDAO->insert($data);
  if (!empty($insertedVideo)) {
    $_SESSION['info'] = 'Het bestand werd ge-upload!';
    header('Location: index.php?page=uploadVideo');
    exit();
  }

  if (!empty($errors)) {
    $_SESSION['error'] = 'De afbeelding kon niet toegevoegd worden!';
  }
  $this->set('errors', $errors);
}

private function _handleAddPhoto(){
  $data = array_merge($_POST, array(
    'created' => date('Y-m-d H:i:s'),
    'image' => 'will-be-set-later',
    'video' => '',
    'videoPlatform' => '',
    'embed' => '',
    'approved' => 1,
    'extraPoints' => 0,
    'opdracht_id' => $_POST["opdracht"],
    'scouts_id' => $_POST["scouts"],
    'commentaar' => $_POST["commentaar"]

  ));
  // valideer de non-file data (gallery_id, title)
  $errors = $this->InzendingenDAO->validate($data);
  if (empty($_FILES['image']) || !empty($_FILES['image']['error'])) {
    $errors['image'] = 'Gelieve een bestand te selecteren';
  }
  if (empty($errors)) {
    // controleer of het een afbeelding is
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $whitelist_type = array('image/jpeg', 'image/png','image/gif');
    if (!in_array(finfo_file($fileinfo, $_FILES['image']['tmp_name']), $whitelist_type)) {
      $errors['image'] = 'Gelieve een jpeg, png of gif te selecteren';
    }
  }
  if (empty($errors)) {
    // controleer de afmetingen van het bestand
    $size = getimagesize($_FILES['image']['tmp_name']);
    if ($size[0] < 480 || $size[1] < 270) {
      $errors['image'] = 'De afbeelding moet minimum 612x612 pixels groot zijn';
    }
  }
  if (empty($errors)) {
    $projectFolder = realpath(__DIR__ . '/..');
    $targetFolder = $projectFolder . '/assets/img';
    $targetFolder = tempnam($targetFolder, '');
    unlink($targetFolder);
    mkdir($targetFolder, 0777, true);
    $targetFileName = $targetFolder . '/' . $_FILES['image']['name'];
    $this->_resizeAndCrop(
      $_FILES['image']['tmp_name'],
      $targetFileName,
      480, 270
    );
    $relativeFileName = substr($targetFileName, 1 + strlen($projectFolder));
    $data['image'] = $relativeFileName;
    $insertedImage = $this->InzendingenDAO->insert($data);
    if (!empty($insertedImage)) {
      $_SESSION['info'] = 'Het bestand werd ge-upload!';
      header('Location: index.php?page=uploadFoto');
      exit();
    }
  }
  if (!empty($errors)) {
    $_SESSION['error'] = 'De afbeelding kon niet toegevoegd worden!';
  }
  $this->set('errors', $errors);
}

private function _resizeAndCrop($src, $dst, $thumb_width, $thumb_height) {
    $type = exif_imagetype($src);
    $allowedTypes = array(
      1,  // [] gif
      2,  // [] jpg
      3,  // [] png
      6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) {
      return false;
    }
    switch ($type) {
      case 1 :
        $image = imagecreatefromgif($src);
        break;
      case 2 :
        $image = imagecreatefromjpeg($src);
        break;
      case 3 :
        $image = imagecreatefrompng($src);
        break;
      case 6 :
        $image = imagecreatefrombmp($src);
        break;
    }

    $filename = $dst;

    $width = imagesx($image);
    $height = imagesy($image);

    $original_aspect = $width / $height;
    $thumb_aspect = $thumb_width / $thumb_height;

    if ( $original_aspect >= $thumb_aspect ) {
       // If image is wider than thumbnail (in aspect ratio sense)
       $new_height = $thumb_height;
       $new_width = $width / ($height / $thumb_height);
    } else {
       // If the thumbnail is wider than the image
       $new_width = $thumb_width;
       $new_height = $height / ($width / $thumb_width);
    }

    $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

    // Resize and crop
    imagecopyresampled($thumb,
                       $image,
                       0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                       0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                       0, 0,
                       $new_width, $new_height,
                       $width, $height);
    imagejpeg($thumb, $filename, 80);
    return true;
  }
}
