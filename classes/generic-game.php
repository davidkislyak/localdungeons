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
    private $_name;
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
     * @param string $_name Name of event
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
    public function __construct($_gameName, $_name, $_host, $_date, $_time, $_city, $_zip, $_street,
                                $_genre, $_type ='RPG', $_tags =array(), $_capacity='0')
    {
        $this->_name = $_name;
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
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getGameName()
    {
        return $this->_gameName;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @return int
     */
    public function getZip()
    {
        return $this->_zip;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * @return string
     */
    public function getCapacity()
    {
        return $this->_capacity;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return string
     */
    public function getEdition()
    {
        return $this->_edition;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->_genre;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->_notes;
    }

    //setters
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @param mixed $gameName
     */
    public function setGameName($gameName)
    {
        $this->_gameName = $gameName;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->_host = $host;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->_time = $time;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @param int $zip
     */
    public function setZip($zip)
    {
        $this->_zip = $zip;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->_street = $street;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    /**
     * @param string $capacity
     */
    public function setCapacity($capacity)
    {
        $this->_capacity = $capacity;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @param string $edition
     */
    public function setEdition($edition)
    {
        $this->_edition = $edition;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->_genre = $genre;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->_notes = $notes;
    }
}