<?php

require_once __DIR__ . '/DAO.php';

class MonthsDAO extends DAO {
    public function selectAll() {
        $sql = "SELECT * FROM `months` ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}