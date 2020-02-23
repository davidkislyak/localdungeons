<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/19/2020
 * @version 1.0
 * other.php
 * GreenRiverDev
 * @link
 */


class other extends game
{
    private $_gameName;
    private $_edition;
    private $_genre;
    private $_notes;

    /**
     * other constructor.
     * @param $_name
     * @param $_host
     * @param $_gameName
     * @param $_genre
     * @param $_date
     * @param $_time
     * @param $_location
     * @param array $_keywords
     * @param string $_capacity
     * @param bool $_repeat
     * @param string $_edition
     */
    public function __construct($_name, $_host, $_gameName,  $_genre, $_date, $_time, $_location, $_keywords =array(),
                                $_capacity= '50', $_repeat=false, $_edition='Na')
    {
        parent::__construct($_name, $_host, $_date, $_time, $_location, $_keywords,
            $_capacity, $_repeat);
        $this->_gameName = $_gameName;
        $this->_genre = $_genre;
        $this->_edition = $_edition;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return parent::getName();
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return parent::getHost();
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return ;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return parent::getTime();
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return parent::getLocation();
    }

    /**
     * @return array
     */
    public function getKeywords()
    {
        return parent::getKeywords();
    }

    /**
     * @return string
     */
    public function getCapacity()
    {
        return parent::getCapacity();
    }

    /**
     * @return bool
     */
    public function isRepeat()
    {
        return parent::isRepeat();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return parent::getType();
    }


}