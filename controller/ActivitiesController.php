<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller{

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }
  public function index() {
      $activities = $this->activityDAO->selectAllActivities();

      $this->set("activities", $activities);
  }

  public function create() {

    if(!empty($_POST['action'])){
      if($_POST["action"] == "createActivity") {
        $insertActivity = $this->activityDAO->createActivity($_POST);
        if(!$insertActivty){
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


