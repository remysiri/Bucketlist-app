<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/CategoryDAO.php';

class CategoryController extends Controller{

  function __construct() {
    $this->categoryDAO = new CategoryDAO();
  }

  public function index() {
    $activities = $this->categoryDAO->selectAllActivityByCategory("racing");

    $this->set("activities", $activities);
  }

}


