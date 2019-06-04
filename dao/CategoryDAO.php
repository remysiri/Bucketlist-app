<?php

require_once __DIR__ . '/DAO.php';

class CategoryDAO extends DAO {
    public function selectAllActivityByCategory($category) {
        $sql = "SELECT * FROM activities WHERE category = :category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("category", $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}