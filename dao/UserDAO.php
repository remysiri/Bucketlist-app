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

    public function logUserIn($data) {
        $errors = $this->validateLogin($data);
        if(empty($errors)) {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue("username", $data["username"]);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function addUser($data) {
        $errors = $this->validate($data);
        $hashedpw = password_hash($data['password'], PASSWORD_DEFAULT);
        if(empty($errors)) {
            $sql = "INSERT INTO `users` (`username`,`password`,`email`, `role`) VALUES (:username, :password, :email, :role)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('username', $data['username']);
            $stmt->bindValue('password', $hashedpw);
            $stmt->bindValue('email', $data['email']);
            $stmt->bindValue('role', 0);
            $stmt->execute();
        }
    }

    public function validateLogin($data) {
        $errors = [];

        if(!empty($data["username"])) {
            $sql_login_username = "SELECT username, password FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($sql_login_username);
            $stmt->bindValue("username", $data["username"]);
            $stmt->execute();
            $result_username = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result_username["username"] !== $data["username"]) {
                $errors["username"] = "Username does not exists";
            }

            if (!password_verify($data["password"], $result_username["password"])) {
                $errors["password"] = "Password inccorect";
            }
        }

        return $errors;
    }

    public function validate($data) {
        $errors = [];

        if (!empty($data["username"])) {
            $sql_username = "SELECT username FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($sql_username);
            $stmt->bindValue("username", $data["username"]);
            $stmt->execute();
            $result_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result_user["username"] == $data["username"]) {
                $errors["username"] = "Username already taken.";
            }
        } else if (empty($data["username"])) {
            $errors["username"] = "Username required";
        }

        if (!empty($data["email"])) {
            $sql_email = "SELECT email FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql_email);
            $stmt->bindValue("email", $data["email"]);
            $stmt->execute();
            $result_mail = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result_mail["email"] == $data["email"]) {
                $errors["email"] = "Email already taken.";
            }
        } else if (empty($data["email"])) {
            $errors["email"] = "E-mail required";
        }

        if (!empty($data["password"])) {
            if(strlen($data["password"]) < 6) {
                $errors["password"] = "Password must be longer than 6 characters.";
            }
        } else if (empty($data["password"])) {
            $errors["password"] = "Password required";
        }

        if (!empty($data["confirm-password"])) {
            if($data["password"] !== $data["confirm-password"]) {
                $errors["confirm-password"] = "Password does not match";
            }
        } else if (empty($data["confirm-password"])) {
            $errors["confirm-password"] = "Password confirmation is required.";
        }

        return $errors;
    }
}