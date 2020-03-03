<?php

class LocalDungeonController
{
    private $_f3; //Router

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function test(){
        $this->_db = new database();
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
}
