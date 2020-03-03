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
    //$GLOBALS['controller']->home();
    $GLOBALS['controller']->test();

});

//define the events route
$f3->route('GET /events', function () {
    $GLOBALS['controller']->events();
});

//run fat free
$f3->run();