<?php

class LocalDungeonController
{
    private $_f3; //Router

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function events()
    {
        $view = new Template();
        echo $view->render('views/events.html');
    }

    public function login()
    {
        $view = new Template();
        echo $view->render('views/login.html');
    }

    public function event($event_id)
    {
        $view = new Template();
        echo $view->render('views/event.html');
    }

    public function registeredEvents()
    {
        $view = new Template();
        echo $view->render('views/myevents.html');
    }
}
