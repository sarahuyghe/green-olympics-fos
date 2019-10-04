<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/InzendingenDAO.php';
require_once __DIR__ . '/../dao/OpdrachtenDAO.php';
require_once __DIR__ . '/../dao/MonthsDAO.php';


class OpdrachtenController extends Controller {

  function __construct() {
    $this->InzendingenDAO = new InzendingenDAO();
    $this->OpdrachtenDAO = new OpdrachtenDAO();
    $this->MonthsDAO = new MonthsDAO();

  }

  public function opdrachten() {
    $maanden = $this->MonthsDAO->selectAll();
    $opdrachtenMonth = array();
    foreach($maanden as $maand){
      $test = $this->OpdrachtenDAO->selectByMonthId($maand['id']);
      array_push($opdrachtenMonth, $test);
    };
    
    for ($x = 0; $x <7; $x++){
      $maanden[$x]["opdrachten"] = $opdrachtenMonth[$x];
    };
    
    $this->set('maanden', $maanden);
  }

  public function regels() {
  }

  public function detail() {
    $opdracht = false;
    if(!empty($_GET['id'])) {
      $opdracht = $this->OpdrachtenDAO->selectById($_GET['id']);
      $inzendingen = $this->InzendingenDAO->selectByOpdrachtId($_GET['id']);
    }
    if(empty($opdracht)) {
      $_SESSION['error'] = "Onbekende opdracht";
      header('Location: index.php');
      exit();
    }
    $this->set('opdracht', $opdracht);
    $this->set('inzendingen', $inzendingen);
  }

}
