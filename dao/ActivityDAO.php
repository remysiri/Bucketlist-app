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

    public function createActivity($data) {
        $errors = $this->validate($data);
        if(empty($errors)) {
            $sql = "INSERT INTO `activities` (`name`,`description`,`active`, `created_by`) VALUES (:name, :description, :active, :created_by)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('name', $data['name']);
            $stmt->bindValue('description', $data['description']);
            $stmt->bindValue('active', 0);
            $stmt->bindValue('created_by', $data['id']);
            $stmt->execute();
        }
    }

    public function editActivity() {

    }

    public function deleteActivity() {

    }

    public function validate($data) {
        $errors = [];

        if(empty($data["name"])) {
            $errors["name"] = "Name required";
        }
        if(empty($data["description"])) {
            $errors["description"] = "Name required";
        }
    
    }
}