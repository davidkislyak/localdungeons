<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/21/2020
 * @version 1.0
 * mtg.php
 * GreenRiverDev
 * @link https://github.com/davidkislyak/localdungeons.git
 */


class Mtg extends GenericGame
{
    /**
     * Mtg constructor.
     * @param $_eventName
     * @param $_host
     * @param $_date
     * @param $_time
     * @param $_city
     * @param $_zip
     * @param $_street
     * @param string $_genre
     * @param array $_tags
     * @param string $_capacity
     */
    public function __construct($_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'Fantasy',
                                $_tags = array(), $_capacity = '0')
    {
        $_gameName = 'Magic the Gathering';
        $_type = 'Trading Cards';
        parent::__construct($_gameName, $_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }
}