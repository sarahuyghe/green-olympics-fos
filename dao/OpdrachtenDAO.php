<?php

require_once __DIR__ . '/DAO.php';

class OpdrachtenDAO extends DAO {
    public function selectAll() {
        $sql = "SELECT * FROM `opdrachten` ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectById($id) {
        $sql = "SELECT `opdrachten`.*, `months`.*  FROM `opdrachten` INNER JOIN `months` ON `months_id` = `months`.`id` WHERE `opdrachten`.`id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function selectByMonthId($id) {
        $sql = "SELECT * FROM `opdrachten` WHERE `months_id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}