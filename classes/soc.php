<?php

class Soc extends GenericGame
{
    /**
     * Soc constructor.
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
     * @param string $_edition
     */
    public function __construct($_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'Medieval',
                                $_tags = array(), $_capacity = '0', $_edition = '')
    {
        $_gameName = 'Settlers of Catan '.$_edition;
        $_type = 'Board game';
        parent::__construct($_gameName, $_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }
}