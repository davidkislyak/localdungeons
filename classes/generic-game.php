<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/19/2020
 * @version 2.0
 * generic.php
 * GreenRiverDev
 * @link https://github.com/davidkislyak/localdungeons.git
 */


class GenericGame
{
    private $_eventName;
    private $_gameName;
    private $_host;
    private $_date;
    private $_time;
    private $_city;
    private $_zip;
    private $_street;
    private $_capacity;
    private $_type;
    private $_edition;
    private $_genre;
    private $_tags;
    private $_notes;

    /**
     * generic-game constructor.
     * @param string $_eventName Name of event
     * @param string $_gameName Type of game
     * @param $_host User who is hosing
     * @param string $_date that event is taking place
     * @param string $_time that event is taking place.
     * @param string $_city the city the event is taking place.
     * @param int $_zip the zip where the event is happening
     * @param string $_street the street where event is happening
     * @param string $_genre the genre of the game
     * @param string $_type *Depreciated*
     * @param array $_tags the tags describing the event
     * @param string $_capacity the max capacity of the event
     */
    public function __construct($_gameName, $_eventName, $_host, $_date, $_time, $_city, $_zip, $_street,
                                $_genre, $_type ='RPG', $_tags =array(), $_capacity='0')
    {
        $this->_eventName = $_eventName;
        $this->_gameName = $_gameName;
        $this->_host = $_host;
        $this->_date = $_date;
        $this->_time = $_time;
        $this->_city = $_city;
        $this->_zip = $_zip;
        $this->_street = $_street;
        $this->_type = $_type;
        $this->_genre = $_genre;
        $this->_tags = $_tags;
        $this->_capacity = $_capacity;
    }

    //getters
    /**
     * getEventName() - getter for eventName.
     * @return string
     */
    public function getEventName()
    {
        return $this->_eventName;
    }

    /**
     * getGameName() - getter of gameName
     * @return string
     */
    public function getGameName()
    {
        return $this->_gameName;
    }

    /**
     * getHost() - getter of host (host has the value of 'Host' if the user is a host,
     * and 'Attendee' if they are attending the event.
     * @return mixed
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * getDate() - getter of Date. The date is when the game/event takes place.
     * @return string
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * getTime() - getter of time. Time is the set time the game/event takes place.
     * @return string
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * getCity() - getter of city. the City that the game/event takes place.
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * getZip() - getter of zip. the Zip where the game/event takes place.
     * @return int
     */
    public function getZip()
    {
        return $this->_zip;
    }

    /**
     * getStreet() - getter of street. the Street where the game/event takes place.
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * getTags() - getter of the tags array. the Tags that are associated with the game/event.
     * @return array
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * getCapacity() - getter of Capacity. The max Capacity of the location.
     * @return string
     */
    public function getCapacity()
    {
        return $this->_capacity;
    }

    /**
     * getType() getter of Type. The type of game.
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * getEdition() getter of Edition. The edition of the game (if applicable)
     * @return string
     */
    public function getEdition()
    {
        return $this->_edition;
    }

    /**
     * getGenre() - getter of Genre. the Genre of the game.
     * @return mixed
     */
    public function getGenre()
    {
        return $this->_genre;
    }

    /**
     * getNotes() - getter of Notes. Miscellaneous notes and/or description of the game/event.
     * @return mixed
     */
    public function getNotes()
    {
        return $this->_notes;
    }

    //setters
    /**
     * setEventName() - setter for eventName.
     * @param mixed $name
     */
    public function setEventName($name)
    {
        $this->_eventName = $name;
    }

    /**
     * setGameName() - getter for gameName.
     * @param mixed $gameName
     */
    public function setGameName($gameName)
    {
        $this->_gameName = $gameName;
    }

    /**
     * setHost() - setter for host.
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->_host = $host;
    }

    /**
     * setDate() - setter of Date.
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * setTime() - setter of Time.
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->_time = $time;
    }

    /**
     * setDate() - setter of City.
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * setZip() - setter of Zip.
     * @param int $zip
     */
    public function setZip($zip)
    {
        $this->_zip = $zip;
    }

    /**
     * setStreet() - setter of Street.
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->_street = $street;
    }

    /**
     * setTags() - setter of the Tag array.
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    /**
     * setCapacity() - setter of Capacity.
     * @param string $capacity
     */
    public function setCapacity($capacity)
    {
        $this->_capacity = $capacity;
    }

    /**
     * setType() - setter of Type.
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * getEdition() - setter of the Edition.
     * @param string $edition
     */
    public function setEdition($edition)
    {
        $this->_edition = $edition;
    }

    /**
     * getGenre() - setter of genre.
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->_genre = $genre;
    }

    /**
     * getNotes() - setter of Notes.
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->_notes = $notes;
    }
}