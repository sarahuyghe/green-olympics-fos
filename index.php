<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'index' => array(
    'controller' => 'Inzendingen',
    'action' => 'index'
  ),
  'scoreboard' => array(
    'controller' => 'Inzendingen',
    'action' => 'scoreboard'
  ),
  'upload' => array(
    'controller' => 'Inzendingen',
    'action' => 'upload'
  ),
  'uploadVideo' => array(
    'controller' => 'Inzendingen',
    'action' => 'uploadVideo'
  ),
  'uploadFoto' => array(
    'controller' => 'Inzendingen',
    'action' => 'uploadFoto'
  ),
  'login' => array(
    'controller' => 'Users',
    'action' => 'login'
  ),
  'logout' => array(
    'controller' => 'Users',
    'action' => 'logout'
  ),
  'register' => array(
    'controller' => 'Users',
    'action' => 'register'
  ),
  'admin' => array(
    'controller' => 'Users',
    'action' => 'admin'
  )
  ,
  'opdrachten' => array(
    'controller' => 'Opdrachten',
    'action' => 'opdrachten'
  ),
  'detail' => array(
    'controller' => 'Opdrachten',
    'action' => 'detail'
  ),
  'regels' => array(
    'controller' => 'Opdrachten',
    'action' => 'regels'
  ),
);


if(empty($_GET['page'])) {
  $_GET['page'] = 'index';
}
if(empty($routes[$_GET['page']])) {
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