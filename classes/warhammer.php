<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/22/2020
 * @version 1.0
 * warhammer.php
 * GreenRiverDev
 * @link https://github.com/davidkislyak/localdungeons.git
 */


class Warhammer extends GenericGame
{
    public function __construct($_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'fantasy',
                                $_tags = array(), $_capacity = '0', $_edition = 'AOS')
    {
        $_gameName = 'Wahammer '.$_edition;
        $_type = 'Miniature Wargaming';
        parent::__construct($_gameName, $_eventName, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }
}