<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/UserDAO.php';

class RegisterController extends Controller{

  function __construct() {
    $this->userDAO = new userDAO();
  }

  public function index() {

    if(!empty($_POST['action'])){
      if($_POST["action"] == "addUser") {
        $insertUser = $this->userDAO->addUser($_POST);
        if(!$insertUser){
          $errors = $this->userDAO->validate($_POST);
          $this->set("errors", $errors);
        }else{
          $_SESSION['info'] = 'Bedankt voor je registratie';
          header('Location:index.php?page=register');
          exit();
        }
      }
    }

  }
}