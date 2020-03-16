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

    public function test()
    {
        $db = $this->_db;

        //initializes the search result array
        $searchResults = array();

        $test = $db->search('Dungeons & Dragons 5E', 'Kent');
        foreach ($test as $item) {

            //get tags from the database
            $tagArray = array();

            foreach ($db->fetchTags($item['event_id']) as $tag) {

                array_push($tagArray, $tag['tag_name']);
            }

            //explodes the DATETIME data gotten from the database
            $explode = explode(" ", $item['event_date']);
            $day = $explode[0];
            $time = $explode[1];


            //creates temp object
            $object = new Dnd($item['event_name'], 'host', $day, $time, $item['city'], $item['zip'],
                $item['street'], $item['genre_name'], $tagArray, $item['capacity']);
            $object->setNotes($item['event_description']);

            //Adds to the search results
            array_push($searchResults, $object);
        }
        //print results
        foreach ($searchResults as $item) {
            echo '<br>' . $item->getName() . '<br>';
            echo $item->getGameName() . '<br>';
            echo $item->getHost() . '<br>';
            echo $item->getDate() . '<br>';
            echo $item->getTime() . '<br>';
            echo $item->getCity() . '<br>';
            echo $item->getZip() . '<br>';
            echo $item->getStreet() . '<br>';
            echo $item->getGenre() . '<br>';

            foreach ($item->getTags() as &$tag) {
                echo $tag . ', ';
            }
            echo '<br>' . $item->getNotes() . '<br>';
            echo $item->getCapacity() . '<br><br><br><br>';
        }
        //DB connection
        $db = $this->_db;
        $view = new Template();

        //Get events with search query
        $f3 = $this->_f3;
        $f3->set('events', ($db->search('Dungeons & Dragons 5E', 'kent')));

        //Render page
        echo $view->render('views/testevents.html');
    }

    public function home()
    {

        $db = $this->_db;
        $view = new Template();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //TODO: Validate Inputs

            //Assign search to session.
            $_SESSION['eventGameSearch'] = $_POST['gameSearch'];
            $_SESSION['eventCitySearch'] = $_POST['citySearch'];
            $_SESSION['eventGameSearchName'] = $db->getGameName($_POST['gameSearch']);

            //Session dumps
//            var_dump($_SESSION['eventGameSearch']);
//            var_dump($_SESSION['eventCitySearch']);

            $_SESSION['filter'] = NUll;
            //Redirect to events

            $this->_f3->reroute('/events');
        }

//        if($_POST['game'] && $_POST['city']){
//            $game = $_POST['game'];
//            $city = $_POST['city'];
//
//            $search = $db->search($game, $city);
//            $f3->reroute('/events');
//        }

        //Get search dropdown params
        $this->_f3->set('games', $db->fetchGames());

        echo $view->render('views/home.html');
    }

    public function events()
    {
        $db = $this->_db;
        $view = new Template();
        $f3 = $this->_f3;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate Inputs
            if (in_array($_POST['genre'], $db->fetchGenres())) {
                $_SESSION['filter'] = NULL;
            } else {
                $_SESSION['filter'] = $_POST['genre'];
            }

            //Assign search to session.
            $_SESSION['eventGameSearch'] = $_POST['gameSearch'];
            $_SESSION['eventCitySearch'] = $_POST['citySearch'];
            $_SESSION['eventGameSearchName'] = $db->getGameName($_POST['gameSearch']);

            //Session dumps
            var_dump($_SESSION['eventGameSearch']);
            var_dump($_SESSION['eventCitySearch']);
        }

        //If filter search
        if ($_SESSION['filter'] == NULL OR $_SESSION['filter'] == 'none') {
            $f3->set('events', ($db->search(
                $db->getGameName($_SESSION['eventGameSearch']), $_SESSION['eventCitySearch']))
            );

        } else {
            $f3->set('events', ($db->searchFilter(
                $db->getGameName($_SESSION['eventGameSearch']), $_SESSION['eventCitySearch'],
                $db->getGenreName($_SESSION['filter'])))
            );
        }

        //search
        $f3->set('eventObjects', $this->buildEvents());

        //save found events to session for use later
        $_SESSION['eventObjects'] = $f3->get('eventObjects');
//        var_dump($_SESSION['eventObjects']);

        //Get dropdown params
        $f3->set('games', $db->fetchGames());
        $f3->set('genres', $db->fetchGenres());

//        var_dump($f3->get('events'));
//      searchResults
//        $db->fetchTags($event_id);

        echo $view->render('views/events.html');
    }

    public function event($event_id)
    {
        //if a submit button is clicked
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //TODO: validate inputs

            //tmp hive vars
            $this->_f3->set('newRsvp', $_POST['rsvp']);

            echo 'New: ' . $_POST['rsvp'] . ' | ' . ' Current: ' . $this->_f3->get('rsvp');

            //check if any changes to rsvp where made
            if ($this->_f3->get('rsvp') != $this->_f3->get('newRsvp')) {
                //rsvp status changed, post status was triggered by rsvp button.
                //check if user is logged in.
                if (!isset($_SESSION['userId'])) {
                    $this->_f3->reroute('/login');
                } else {
                    //update rsvp
                    $this->_f3->set('rsvp', 'going');

                    $_SESSION['rsvp'] = true;

                    //update rsvp list in db
                    $this->_db->eventRegistration($_SESSION['userId'],
                        $this->_db->getEventId(($_SESSION['eventObjectPost']->getName())));
                }
            } else {
                //rsvp status has not changed, post status triggered by search button.
                //Assign search to session.
                $_SESSION['eventGameSearch'] = $_POST['gameSearch'];
                $_SESSION['eventCitySearch'] = $_POST['citySearch'];
                $_SESSION['eventGameSearchName'] = $this->_db->getGameName($_POST['gameSearch']);

                $_SESSION['filter'] = NUll;

                //Redirect to events
                $this->_f3->reroute('/events');
            }
        }

        //set hive vars
        $this->_f3->set('eventEncode', $event_id);
        $this->_f3->set('games', $this->_db->fetchGames());
        $this->_f3->set('rsvp', null);

        //find desired event object
        foreach ($_SESSION['eventObjects'] as $event) {
            if ($this->_f3->get('eventEncode') == $event->getName()) {
                //assign event to hive
                $this->_f3->set('eventObject', $event);

                //for use in post
                $_SESSION['eventObjectPost'] = $event;
            }
        }

        //check if already rsvp'd
        foreach ($this->_db->getEventRsvp(
                     $this->_db->getEventId(($_SESSION['eventObjectPost']->getName()))) as $user) {
            if ($user == $_SESSION['userId']) {
                $this->_f3->set('rsvp', 'going');
                $_SESSION['rsvp'] = 'going';
            }
        }

        $view = new Template();
        echo $view->render('views/event.html');
    }

    public function login()
    {
        $db = $this->_db;
        $view = new Template();

        if ($_POST['username'] && $_POST['password']) {
            //get from post
            $user = $_POST['username'];
            $password = $_POST['password'];

            //add data to hive
            $this->_f3->set('username', $user);
            $this->_f3->set('password', $password);

            //validate info
            if (validLogin($db)) {
                //assign needed values to session
                $_SESSION['userId'] = $db->getUserId($user, $password);
                $_SESSION['username'] = $user;

                //redirect to homepage
                $this->_f3->reroute('/');
            }
        }

        echo $view->render('views/login.html');
    }

    public function logout()
    {
        $_SESSION['userId'] = NULL;

        session_destroy();
        $this->_f3->reroute('/');
    }

    public function createAccount()
    {
        $db = $this->_db;
        $view = new Template();

        if ($_POST['username'] && $_POST['password']) {
            //Get from post
            $user = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            //Set hive vars
            $this->_f3->set("username", $user);
            $this->_f3->set("password", $password);
            $this->_f3->set("passwordConfirm", $passwordConfirm);

            //Validation
            if (validNewAccount()) {
                //Insert user and assign session variables
                $_SESSION['userId'] = $db->insertUser($user, $password);
                $_SESSION['username'] = $user;

                $this->_f3->reroute('/');
            }
        }

        echo $view->render('views/createuser.html');
    }

    public function registeredEvents()
    {
        //check if user is logged in.
        if (isset($_SESSION['userId'])) {
            $view = new Template();
            echo $view->render('views/myevents.html');
        } else {
            $this->_f3->reroute('/login');
        }
    }

    public function createEvent()
    {
        //check if user is logged in.
        if (isset($_SESSION['userId'])) {
            $db = $this->_db;
            $view = new Template();

//        if(post) {
//          $game = new GenericGame(post post... post);
//          addEvent($game, user_id);
//            $db->insertEvent($game_id, $location_id, $genre_id, $name, $date, $capacity);
//        }
            echo $view->render('views/createevent.html');
        } else {
            $this->_f3->reroute('/login');
        }
    }

    public function account()
    {
        //check if user is logged in.
        if (isset($_SESSION['userId'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $password = $_POST['password'];
                $passwordConfirm = $_POST['passwordConfirm'];

                //add data to hive
                $this->_f3->set('password', $password);
                $this->_f3->set('passwordConfirm', $passwordConfirm);

                //check if valid
                if (validNewPassword()) {
                    $this->_db->updateUserPassword($_SESSION['userId'], $this->_f3->get('password'));
                }
            }

            $view = new Template();
            echo $view->render('views/myaccount.html');
        } else {
            $this->_f3->reroute('/login');
        }
    }

    //helper functions

    /**
     * registers a new event in the database
     * @param $game
     * @param $user_id
     */
    private function addEvent($game, $user_id)
    {
        $db = $this->_db;

        $name = $game->getName();
        $game_id = $db->getGameId(get_class($game) . ' ' . $game->getEdition());
        $host = $game->getHost();
        $date = $game->getDate();
        $time = $game->getTime();
        $location_id = $this->location($game);
        $capacity = $game->getCapacity();
        $genre = $db->getGenreId($game->getGenre());
        $tags = $game->getTags();
        $notes = $game->getNotes();

        $event_id = $db->insertEvent($game_id, $location_id, $genre, $name, $date, $capacity);

        foreach ($tags as $tag) {
            $tag_id = $db->getTagId($tag);
            $db->addTag($event_id, $tag_id);
        }

        $this->register($user_id, $event_id, 'Host');
    }

    private function register($user_id, $event_id, $privilege)
    {
        $db = $this->_db;

        $db->eventRegistration($user_id, $event_id, $privilege);
    }

    private function location($game)
    {
        $db = $this->_db;

        $city = $game->getCity();
        $zip = $game->getZip();
        $street = $game->getStreet();

        return $db->insertLocation($city, $zip, $street);
    }

    private function buildEvents()
    {
        //initializes the search result array
        $searchResults = array();

        foreach ($this->_f3->get('events') as $item) {

            //get tags from the database
            $tagArray = array();

            foreach ($this->_db->fetchTags($item['event_id']) as $tag) {

                array_push($tagArray, $tag['tag_name']);
            }

            //explodes the DATETIME data gotten from the database
            $explode = explode(" ", $item['event_date']);
            $day = $explode[0];
            $time = $explode[1];

            //creates temp object
            $object = new Dnd($item['event_name'], 'host', $day, $time, $item['city'], $item['zip'],
                $item['street'], $item['genre_name'], $tagArray, $item['capacity']);
            $object->setNotes($item['event_description']);

            //Adds to the search results
            array_push($searchResults, $object);
        }

        return $searchResults;
    }
}
