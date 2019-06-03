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
        $checkUser = $this->userDAO->logUserIn($_POST);
        if(!$checkUser) {
          $errors = $this->userDAO->validateLogin($_POST);
          $this->set("errors", $errors);
        } else {
          $_SESSION["info"] = "Logged in!";
          header("location: index.php");
        }
      }
    }

  }

}
