<?php

require_once __DIR__ . '/DAO.php';

class ActivityDAO extends DAO {
    public function selectAllActivities() {
        $sql = "SELECT * FROM activities";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectActivityById() {

    }

    public function createActivity() {

    }

    public function editActivity() {

    }

    public function deleteActivity() {

    }
}