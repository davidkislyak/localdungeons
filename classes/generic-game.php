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
    private $_repeat;
    private $_type;
    private $_edition;
    private $_genre;
    private $_keywords;
    private $_notes;

    /**
     * generic-game constructor.
     * @param string $_name
     * @param string $_gameName
     * @param $_host
     * @param $_date
     * @param $_time
     * @param string $_city
     * @param int $_zip
     * @param string $_street
     * @param string $_genre
     * @param string $_edition
     * @param string $_type
     * @param array $_tags
     * @param string $_capacity
     * @param bool $_repeat
     */
    public function __construct($_name, $_gameName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre,
                                $_edition = 'na', $_type ='RPG', $_tags =array(), $_capacity= '50', $_repeat=false)
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
        $this->_edition = $_edition;
        $this->_keywords = $_tags;
        $this->_capacity = $_capacity;
        $this->_repeat = $_repeat;
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
        return $this->_keywords;
    }

    /**
     * @return string
     */
    public function getCapacity()
    {
        return $this->_capacity;
    }

    /**
     * @return bool
     */
    public function isRepeat()
    {
        return $this->_repeat;
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
     * @param mixed $location
     */
    public function setCity($location)
    {
        $this->city = $location;
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
     * @param array $keywords
     */
    public function setKeywords($keywords)
    {
        $this->_keywords = $keywords;
    }

    /**
     * @param string $capacity
     */
    public function setCapacity($capacity)
    {
        $this->_capacity = $capacity;
    }

    /**
     * @param bool $repeat
     */
    public function setRepeat($repeat)
    {
        $this->_repeat = $repeat;
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