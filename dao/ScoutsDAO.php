<?php

require_once __DIR__ . '/DAO.php';

class ScoutsDAO extends DAO {
    public function selectAll() {
        $sql = "SELECT * FROM `scouts` ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
    }