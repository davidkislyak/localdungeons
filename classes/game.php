<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn, David
 * @date 2/19/2020
 * @version 1.0
 * game.php
 * GreenRiverDev
 * @link https://github.com/davidkislyak/localdungeons.git
 */


class game
{

    private $_name;
    private $_host;
    private $_date;
    private $_time;
    private $_location;
    private $_keywords;
    private $_capacity;
    private $_repeat;
    private $_type;

    /**
     * game constructor.
     * @param $_name
     * @param $_host
     * @param $_date
     * @param $_time
     * @param $_location
     * @param $_keywords
     * @param $_capacity
     * @param $_repeat
     */
    public function __construct($_name, $_host, $_date, $_time, $_location, $_keywords =array(),
                                $_capacity= '50', $_repeat=false)
    {
        $this->_name = $_name;
        $this->_host = $_host;
        $this->_date = $_date;
        $this->_time = $_time;
        $this->_location = $_location;
        $this->_keywords = $_keywords;
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
    public function getLocation()
    {
        return $this->_location;
    }

    /**
     * @return array
     */
    public function getKeywords()
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

    //setters
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
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
    public function setLocation($location)
    {
        $this->_location = $location;
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

}