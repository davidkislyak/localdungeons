<?php

class Warhammer extends GenericGame
{
    /**
     * Warhammer constructor.
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
    public function __construct($_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'fantasy',
                                $_tags = array(), $_capacity = '0', $_edition = 'AOS')
    {
        $_gameName = 'Wahammer '.$_edition;
        $_type = 'Miniature Wargaming';
        parent::__construct($_gameName, $_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }
}