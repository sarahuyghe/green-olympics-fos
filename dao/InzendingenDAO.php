<?php

require_once __DIR__ . '/DAO.php';

class InzendingenDAO extends DAO {

  public function selectAll() {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts` FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id) {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts`
    FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id`
    WHERE `inzendingen`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(pdo::FETCH_ASSOC);
    if($result['id'] != $id) {
      return false;
    }
    return $result;
  }

  public function selectAllApproved() {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts`, `months`.`months` FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id`  INNER JOIN `months` ON `months_id` = `months`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id` WHERE `inzendingen`.`approved` = 0 AND `inzendingen`.`opdracht_id` != 40 ORDER BY RAND() LIMIT 6";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllNotApproved() {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts` FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id` WHERE `inzendingen`.`approved` = 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function selectAllPointsPerScouts($scouts) {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts` FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id` WHERE `scouts`.`scouts` = :scouts AND `inzendingen`.`approved` = 0";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':scouts', $scouts);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectByOpdrachtId($id) {
    $sql = "SELECT `inzendingen`.*, `opdrachten`.`opdracht`, `opdrachten`.`punten`, `scouts`.`scouts`, `months`.`months`FROM `inzendingen` INNER JOIN `opdrachten` ON `opdracht_id` = `opdrachten`.`id` INNER JOIN `months` ON `months_id` = `months`.`id` INNER JOIN `scouts` ON `scouts_id` = `scouts`.`id` WHERE `inzendingen`.`opdracht_id` = :id AND `inzendingen`.`approved` = 0 AND `inzendingen`.`opdracht_id` != 40";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function insert($data) {
    if(empty($errors)) {
      $sql = "INSERT INTO `inzendingen` (`approved`, `image`, `opdracht_id`, `scouts_id`, `created`, `video`, `videoPlatform`, `embed`, `commentaar`) VALUES (:approved, :image, :opdracht_id, :scouts_id, :created, :video, :videoPlatform, :embed, :commentaar)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':approved', $data['approved']);
      $stmt->bindValue(':image', $data['image']);
      $stmt->bindValue(':opdracht_id', $data['opdracht_id']);
      $stmt->bindValue(':scouts_id', $data['scouts_id']);
      $stmt->bindValue(':created', $data['created']);
      $stmt->bindValue(':video', $data['video']);
      $stmt->bindValue(':videoPlatform', $data['videoPlatform']);
      $stmt->bindValue(':embed', $data['embed']);
      $stmt->bindValue(':commentaar', $data['commentaar']);


      if($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return false;
  }

  public function validate($data) {
    $errors = array();
    if(!isset($data['approved'])) {
      $errors['approved'] = 'created is missing';
    }
    if(!isset($data['image'])) {
      $errors['image'] = 'image is missing';
    }
    if(!isset($data['video'])) {
      $errors['video'] = 'image is missing';
    }
    if(!isset($data['videoPlatform'])) {
      $errors['videoPlatform'] = 'image is missing';
    }
    if(!isset($data['embed'])) {
      $errors['embed'] = 'image is missing';
    }
    if(!isset($data['opdracht_id'])) {
      $errors['opdracht_id'] = 'user_id is missing';
    }
    if(!isset($data['scouts_id'])) {
      $errors['scouts_id'] = 'user_id is missing';
    }
    if(!isset($data['created'])) {
      $errors['created'] = 'user_id is missing';
    }
    if(!isset($data['commentaar'])) {
      $errors['commentaar'] = 'user_id is missing';
    }
    return $errors;
  }

  public function delete($id) {
    $sql = "DELETE FROM `inzendingen` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function updatePoints($id, $data) {
    // print_r($data['extraPoints']);
    $sql = "UPDATE `inzendingen` SET `extraPoints` = :extraPoints WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':extraPoints', $data['extraPoints']);
    if($stmt->execute()) {
      return $this->selectById($id);
    }
}

  public function update($id) {
      $sql = "UPDATE `inzendingen` SET `approved` = 0 WHERE `id` = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      if($stmt->execute()) {
        return $this->selectById($id);
      }
  }

}