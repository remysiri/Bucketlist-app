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
    } else if(!empty($_GET["user"]) && $_GET["user"] == $_SESSION["id"]) {
      $activities = $this->activityDAO->selectAllActivitiesByAuthorId($_GET["user"]);
    } else {
      header("location: index.php");
      exit();
    }

    if(!empty($_POST["action"])) {
      if($_POST["action"] == "saveActivity") {
        $saveActivity = $this->activityDAO->saveActivity($_POST);
        header("location: index.php?page=saved");
        exit();
      }

      if($_POST["action"] == "removeBucket") {
        $removeBucket = $this->activityDAO->removeBucket($_POST);
        header("location: index.php");
        exit();
      }
    }

    $this->set("activities", $activities);
  }

  public function saved() {
    $activities = $this->activityDAO->selectAllSavedActivitiesByUserId($_SESSION["id"]);

    if(!empty($_POST["action"])) {
      if($_POST["action"] == "removeSaved") {
        $removeSaved = $this->activityDAO->removeActivity($_POST);
      }
    }

    $this->set("activities", $activities);
  }

  public function detail() {
    $activity = $this->activityDAO->selectActivityById($_GET["id"]);
    if($activity["active"] !== 1) {
      header("location: index.php");
      exit();
    }

    $this->set("activity", $activity);



    $startTime = gmdate('U', strtotime($activity["start_time"]));
    $remain = $startTime - gmdate('U');

    $days_left = floor($remain / (24 * 60 * 60));
    $hours_left = floor($remain % (24 * 60 * 60) / 3600);
    $minutes_left = floor($remain % (60 * 60) / 60);
    $seconds_left = floor($remain % 60);

    $this->set("days", $days_left);
    $this->set("hours", $hours_left);
    $this->set("minutes", $minutes_left);
    $this->set("seconds", $seconds_left);
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

  public function edit() {
    $activity = $this->activityDAO->selectActivityById($_GET["id"]);
    if($_SESSION["role"] >= 3 && !empty($_GET["id"])) {

    } else {
      header("location: index.php");
      exit();
    }

    $this->set("activity", $activity);
  }

}


