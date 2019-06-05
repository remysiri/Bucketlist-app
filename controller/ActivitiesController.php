<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller{

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }
  public function index() {
      $activities = $this->activityDAO->selectAllActivities();
      $uncategorized = $this->activityDAO->selectAllActivityByCategory(null);
      $activeActivity = $this->activityDAO->selectActivityByActive();
      $popularActivity = $this->activityDAO->selectActivityByVotes(10);


      $startTime = gmdate('U', strtotime($activeActivity["start_time"]));
      $remain = $startTime - gmdate('U');

      $days_left = floor($remain / (24 * 60 * 60));
      $hours_left = floor($remain % (24 * 60 * 60) / 3600);
      $minutes_left = floor($remain % (60 * 60) / 60);
      $seconds_left = floor($remain % 60);

      $this->set("activities", $activities);
      $this->set("uncategorized", $uncategorized);
      $this->set("active", $activeActivity);
      $this->set("popular", $popularActivity);
      $this->set("days", $days_left);
      $this->set("hours", $hours_left);
      $this->set("minutes", $minutes_left);
      $this->set("seconds", $seconds_left);

  }

  public function list() {
    if(!empty($_GET["category"])) {
      $activities = $this->activityDAO->selectAllActivityByCategory($_GET["category"]);
    } else if(!empty($_GET["user"])) {
      $activities = $this->activityDAO->selectAllActivitiesByAuthorId($_GET["user"]);
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


