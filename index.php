<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'register' => array(
    'controller' => 'Register',
    'action' => 'index'
  ),
  'login' => array(
    'controller' => 'Login',
    'action' => 'index'
  ),
  'home' => array(
    'controller' => 'Activities',
    'action' => 'index'
  ),
  'create' => array(
    'controller' => 'Activities',
    'action' => 'create'
  )
);
if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
  if (empty($_GET['page'])) {
    $_GET['page'] = 'home';
  }
} else {
  if (empty($_GET['page'])) {
    $_GET['page'] = 'login';
  }
}

if (empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
