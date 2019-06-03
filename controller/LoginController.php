<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/UserDAO.php';

class LoginController extends Controller{

  function __construct() {
    $this->userDAO = new userDAO();
  }

  public function index() {

    if(!empty($_POST['action'])){
      if($_POST["action"] == "login") {
        if(!empty($_POST["username"])) {
        }
      }
    }

  }
}