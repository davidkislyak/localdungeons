<?php
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require autoload file
require_once('vendor/autoload.php');

//session start
session_start();

//create instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$controller = new LocalDungeonController($f3);

//define a default route
$f3->route('GET|POST /', function () {
    $GLOBALS['controller']->home();

});

$f3->route('GET /test', function (){
    $GLOBALS['controller']->test();
});

//define the events route
$f3->route('GET|POST /events', function () {
    $GLOBALS['controller']->events();
});

//define the login route
$f3->route('GET|POST /login', function () {
    $GLOBALS['controller']->login();
});

//define a logout route
$f3->route('GET /logout', function () {
   $GLOBALS['controller']->logout();
});

//define a profile route
$f3->route('GET /myaccount', function () {
    $GLOBALS['controller']->account();
});

//define the event page route
$f3->route('GET /event/@event_id', function ($f3, $params) {
    $f3->set("page", "event");
    $GLOBALS['controller']->event( $params['event_id']);
});

//define registered events page
$f3->route('GET /myevents', function () {
    $GLOBALS['controller']->registeredEvents();
});

//define event creation page route
$f3->route('GET /createevent', function () {
    $GLOBALS['controller']->createEvent();
});

//run fat free
$f3->run();
