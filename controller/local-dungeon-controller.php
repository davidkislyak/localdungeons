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
        echo "<h1>My local events</h1>";
        echo "<a href = 'events'>Find events near me</a>";
    }
}
