<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller{

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }
  public function index() {
      $activities = $this->activityDAO->selectAllActivities();
      $activeActivity = $this->activityDAO->selectActivityByActive();
      $popularActivity = $this->activityDAO->selectActivityByVotes(10);

      $this->set("activities", $activities);
      $this->set("active", $activeActivity);
      $this->set("popular", $popularActivity);
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


