<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class AdminController extends Controller{

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }

  public function index() {
    if($_SESSION["role"] >= 3) {
      $activities = $this->activityDAO->selectAllActivities();
    } else {
      header("location: index.php");
      exit();
    }

    $this->set("activities", $activities);
  }

  public function detail() {
    $activity = $this->activityDAO->selectActivityById($_GET["id"]);

    $this->set("activity", $activity);
  }

  public function create() {

    if(!empty($_POST['action'])){
      if($_POST["action"] == "createActivity") {
        $insertActivity = $this->activityDAO->createActivity($_POST);
        if(!$insertActivity){
          $errors = $this->activityDAO->validate($_POST);
          $this->set("errors", $errors);
        }else{
          $_SESSION['info'] = 'Nieuwe Bucket item toegevoegd';
          header('Location:index.php');
          exit();
        }
      }
    }


  }
}


