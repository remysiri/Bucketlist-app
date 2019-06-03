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
    
  }
}


