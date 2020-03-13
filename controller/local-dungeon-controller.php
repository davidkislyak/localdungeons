<?php

class LocalDungeonController
{
    private $_f3; //Router
    private $_db; //database

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_db = new Database();
    }

    public function home()
    {
        $db = $this->_db;
        $view = new Template();

//        if($_POST['game'] && $_POST['city']){
//            $game = $_POST['game'];
//            $city = $_POST['city'];
//
//            $search = $db->search($game, $city);
//            $f3->reroute('/events');
//        }

        echo $view->render('views/home.html');
    }

    public function events()
    {
        $db =$this->_db;
        $view = new Template();

//      searchResults
//        $db->fetchTags($event_id);

        echo $view->render('views/events.html');
    }

    public function login()
    {
        $db = $this->_db;
        $view = new Template();

//        if($_POST['user'] && $_POST['password']){
//            $user = $_POST['user'];
//            $password = $_POST['password'];
//
//            $user_id = $db->getUserId($user, $password);
//            $f3->reroute('/');
//        }

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

    public function createEvent()
    {
        $db = $this->_db;
        $view = new Template();

//        if(post) {
//            $db->insertEvent($game_id, $location_id, $genre_id, $name, $date, $capacity);
//        }
        echo $view->render('views/createevent.html');
    }

    public function account(){
        $view = new Template();



        echo $view->render('views/myaccount.html');
    }

    //helper functions

    /**
     * registers a new event in the database
     * @param $game
     * @param $user_id
     */
    private function addEvent($game, $user_id){
        $db = $this->_db;

        $name = $game->getName();
        $game_id = $db->getGameId(get_class($game).' '.$game->getEdition());
        $host = $game->getHost();
        $date = $game->getDate();
        $time = $game->getTime();
        $location_id = $this->location($game);
        $capacity = $game->getCapacity();
        $genre = $db->getGenreId($game->getGenre());
        $tags = $game->getTags();
        //$notes = $game->getNotes();

        $event_id = $db->insertEvent($game_id, $location_id, $genre, $name, $date, $capacity);

        foreach($tags as $tag){
            $tag_id = $db->getTagId($tag);
            $db->addTag($event_id, $tag_id);
        }

        $this->register($user_id, $event_id, 'Host');
    }

    private function register($user_id, $event_id, $privilege){
        $db = $this->_db;

        $db->eventRegistration($user_id, $event_id, $privilege);
    }

    private function location($game){
        $db = $this->_db;

        $city = $game->getCity();
        $zip = $game->getZip();
        $street = $game->getStreet();

        return $db->insertLocation($city, $zip, $street);
    }
}
