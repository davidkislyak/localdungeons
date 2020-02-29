<?php
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require autoload file
require_once('vendor/autoload.php');

//session start
//session_start();

//create instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$controller = new LocalDungeonController($f3);

//define a default route
$f3->route('GET /', function () {
    $GLOBALS['controller']->home();
});

//define the events route
$f3->route('GET /events', function () {
    $GLOBALS['controller']->events();
});

//define the login route
$f3->route('GET /login', function () {
    $GLOBALS['controller']->login();
});

//define the event page route
$f3->route('GET /event/@event_id', function ($f3, $params) {
    $GLOBALS['controller']->event( $params['event_id']);
});

//run fat free
$f3->run();