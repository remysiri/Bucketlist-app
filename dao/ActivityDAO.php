<?php

require_once __DIR__ . '/DAO.php';

class ActivityDAO extends DAO {
    public function selectAllActivities() {
        $sql = "SELECT * FROM activities";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectActivityById($id) {
        $sql = "SELECT * FROM activities WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAllActivitiesByAuthorId($id) {
        $sql = "SELECT * FROM activities WHERE created_by = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectActivityByActive() {
        $sql = "SELECT * FROM activities WHERE active = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectActivityByVotes($votes) {
        $sql = "SELECT * FROM activities WHERE votes >= :votes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("votes", $votes);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllActivityByCategory($category) {
        $sql = "SELECT * FROM activities WHERE category = :category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("category", $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createActivity($data) {
        $errors = $this->validate($data);
        if(empty($errors)) {
            $sql = "INSERT INTO `activities` (`name`, `description`, `category`, `active`, `start_time`, `created_by`) VALUES (:name, :description, :category, :active, :start_time, :created_by)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('name', $data['name']);
            $stmt->bindValue('description', $data['description']);
            $stmt->bindValue('category', $data["category"]);
            $stmt->bindValue('active', 0);
            $stmt->bindValue('start_time', $data["start-time"]);
            $stmt->bindValue('created_by', $_SESSION['id']);
            $stmt->execute();
        }
    }

    public function saveActivity($data) {
        $sql = "INSERT INTO `saved_activities` (`user_id`, `activity_id`) VALUES (:userId, :activityId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('userId', $data["user-id"]);
        $stmt->bindValue('activityId', $data["activity-id"]);
        $stmt->execute();
    }

    public function removeActivity($data) {
        $sql = "DELETE FROM saved_activities WHERE activity_id = :activityId AND user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('activityId', $data["activity-id"]);
        $stmt->bindValue('userId', $data["user-id"]);
        $stmt->execute();
    }

    public function removeBucket($data) {
        $sql = "DELETE FROM activities WHERE id = :activityId AND created_by = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('activityId', $data["activity-id"]);
        $stmt->bindValue('userId', $data["user-id"]);
        $stmt->execute();
    }

    public function selectAllSavedActivitiesByUserId($id) {
        $sql = "SELECT * FROM activities INNER JOIN saved_activities ON activities.id = saved_activities.activity_id WHERE user_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        if(empty($data["start-time"])) {
            $errors["start-time"] = "Time required";
        }
    
        return $errors;
    }
}