<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/28/2020
 * @version 1.0
 * database.php
 * GreenRiverDev
 * @link https://github.com/medioxumate/dating4.git
 */

//require(database info root);

class Database
{
    private $_dbh;

    /**
     * database constructor.
     */
    function __construct()
    {
        $this->connect();
    }

    /**
     * connects to database
     * @return PDO|string
     */
    function connect()
    {
        require_once("../../../boiconfig.php");
//        require_once("../../../connect_localdungeons.php");

        try {

            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
            //echo "Connected to database!!!";
            return $this->_dbh;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //Insert methods
    /**
     * adds user to the database
     * @param $user
     * @param $password
     * @return int - Id of the last inserted user.
     */
    public function insertUser($user, $password)
    {
        //query
        $sql = "INSERT INTO `users` (`username`,`password`) VALUES (:username, :password);";

        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':username', $user, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        //exe
        $statement->execute();

        return $this->_dbh->lastInsertId();
    }

    /**
     * inserts an event created by the user into the event table.
     * @param $game_id
     * @param $location_id
     * @param $genre_id
     * @param $name
     * @param $date
     * @param $capacity
     * @return int - Id of the last inserted row.
     */
    public function insertEvent($game_id, $location_id, $genre_id, $name, $date, $capacity){
        //query
        $sql = "INSERT INTO `event` (`event_name`, `event_date`, `event_posting`, `location_id`, `genre_id`, `game_id`,
                `capacity`)
                VALUES (:event_name, :event_date, NOW(), :location_id, :genre_id, :game_id, :capacity);";

        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':event_name', $name, PDO::PARAM_STR);
        $statement->bindParam(':event_date', $date, PDO::PARAM_STR);
        $statement->bindParam(':location_id', $location_id, PDO::PARAM_INT);
        $statement->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $statement->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        $statement->bindParam(':capacity', $capacity, PDO::PARAM_INT);

        //exe
        $statement->execute();

        return $this->_dbh->lastInsertId();
    }

    /**
     * inserts a location into the event_location table.
     * @param $city
     * @param $zip
     * @param $street
     * @return int - Id of the last inserted row.
     */
    public function insertLocation($city, $zip, $street){
        //query
        $sql = "INSERT INTO `event_location` (`city`, `zip`, `street`)
                VALUES (:city, :zip, :street);";
        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
        $statement->bindParam(':zip', $street, PDO::PARAM_STR);

        //exe
        $statement->execute();

        return $this->_dbh->lastInsertId();
    }

    /**
     * Inserts a tag into the tags table.
     * @param $tag
     * @return int - Id of the last inserted tag.
     */
    function insertTag($tag)
    {
        //query
        $sql = "INSERT INTO `tags` (`tag_name`) VALUES (:tag);";
        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':tag', $tag, PDO::PARAM_STR);

        //exe
        $statement->execute();

        return $this->_dbh->lastInsertId();
    }

    /**
     * signs a user up for an event or marks a user as a host. (inserts into the event_registration table).
     * @param $user_id
     * @param $event_id
     * @param int $privilege
     * @return true if successful
     */
    function eventRegistration($user_id, $event_id, $privilege = 0){
        //query
        $sql = "INSERT INTO `event_registration` (`user_id`, `event_id`, `event_privilege`)
                VALUES (:user_id, :event_id, :privilege);";
        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $event_id, PDO::PARAM_INT);
        $statement->bindParam(':privilege', $privilege, PDO::PARAM_INT);

        //exe
        return $statement->execute();
    }

    /**
     * addTag - adds tags to an event. (inserts into the event_tags join table.)
     * @param $event_id
     * @param $tag_id
     * @return true if successful
     */
    function addTag($event_id, $tag_id){
        //query
        $sql = "INSERT INTO `event_tags` (`user_id`, `event_id`)
                VALUES (:user_id, :event_id);";
        //statement
        $statement = $this->_dbh->prepare($sql);

        //bind
        $statement->bindParam(':user_id', $tag_id, PDO::PARAM_INT);
        $statement->bindParam(':event_id', $event_id, PDO::PARAM_INT);

        //exe
        return $statement->execute();
    }

    // getters/queries

    /**
     * get an Id from a tag name
     * @param $tag
     * @return mixed
     */
    function getTagId($tag){
        $sql = "SELECT `tag_id` FROM `tags` WHERE `tag_name`=:tag";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':tag', $tag, PDO::PARAM_STR);

        //exe
        $statement->execute();

        $query = $statement->fetch();

        return $query['tag_id'];
    }

    /**
     * gets game id from game name
     * @param $game
     * @return mixed
     */
    function getGameId($game){
        $sql = "SELECT `game_id` FROM `game` WHERE `game_name`=:game";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':game', $game, PDO::PARAM_STR);
        //exe
        $statement->execute();

        $query = $statement->fetch();

        return $query['game_id'];
    }

    /**
     * gets the user id from the username and password
     * @param $user
     * @param $password
     * @return mixed
     */
    public function getUserId($user, $password){
        $sql = "SELECT `user_id` FROM `user` WHERE `username`=:username AND `password`=:password";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':username', $user, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        //exe
        $statement->execute();

        $query = $statement->fetch();

        return $query['user_id'];
    }

    /**
     * get a location from an id
     * @param $zip
     * @param $street
     * @return mixed
     */
    public function getLocationId($zip, $street){
        $sql = "SELECT `location_id` FROM `event_location` WHERE `zip`=:zip AND `street`=:street";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':zip', $zip, PDO::PARAM_INT);
        $statement->bindParam(':street', $street, PDO::PARAM_STR);

        //exe
        $statement->execute();

        $query = $statement->fetch();

        return $query['location_id'];
    }

    /**
     * gets location from the event_location table.
     * @param $location_id
     * @return mixed
     */
    public function getLocation($location_id){
        $sql = "SELECT `city`, `zip`, `street` FROM `event_location` WHERE `location_id`=:id";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':id', $location_id, PDO::PARAM_INT);

        //exe
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * search based on game and city inputs
     * @param $game
     * @param $city
     * @return mixed
     */
    public function search($game, $city){
        $sql = "SELECT `event`.`event_id`, `event`.`event_name`, `event_location`.`city`, `event_location`.`zip`,
                `event_location`.`street`, `game`.`game_name`, `genres`.`genre_name`, `event`.`event_date`, 
                `event`.`event_posting`, `event`.`event_description` FROM `event`
                    INNER JOIN `game` ON `game`.`game_id` = `event`.`game_id` 
                    INNER JOIN `event_location` ON `event_location`.`location_id` = `event`.`location_id` 
                    INNER JOIN `genres` ON `genres`.`genre_id` = `event`.`genre_id`
                AND `game`.`game_name` = :game AND `event_location`.`city` = :city";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':game', $game, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);

        //exe
        $statement->execute();

        //result
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * gets all tags associated with an event
     * @param $event_id
     * @return mixed
     */
    public function fetchTags($event_id){
        $sql = "SELECT `tags`.tag_name FROM `tags` INNER JOIN `event_tags` ON 
            `event_tags`.tag_id = `tags`.tag_id AND `event_tags`.`event_id` = :event_id";

        //statement
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':event_id', $event_id, PDO::PARAM_STR);

        //exe
        $statement->execute();

        //result
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
