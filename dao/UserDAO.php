<?php

require_once __DIR__ . '/DAO.php';

class UserDAO extends DAO {
    public function selectAllUsers() {

    }

    public function selectByUserId($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id', $_GET('id'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($data) {
        $errors = $this->validate($data);
        if(empty($errors)) {
            $sql = "INSERT INTO `users` (`username`,`password`,`email`, `role`) VALUES (:username, :password, :email, :role)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('username', $data['username']);
            $stmt->bindValue('password', $data['password']);
            $stmt->bindValue('email', $data['email']);
            $stmt->bindValue('role', 0);
            $stmt->execute();
        }
    }

    public function validate($data) {
        $errors = [];
        if (empty($data["username"])) {
            $errors["username"] = "Username required";
        }

        if (empty($data["password"])) {
            $errors["password"] = "Password required";
        }

        if (empty($data["email"])) {
            $errors["email"] = "E-mail required";
        }

        return $errors;
    }
}