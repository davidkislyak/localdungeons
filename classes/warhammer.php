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
    public function __construct($_name, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'fantasy',$_keywords = array(),
                                $_capacity = '0', $_repeat = false, $_edition = 'AOS')
    {
        $_gameName = 'Wahammer';
        $_type = 'Miniature Wargaming';
        parent::__construct($_name, $_host, $_gameName, $_genre, $_date, $_time, $_city, $_zip, $_street, $_type,
            $_keywords, $_capacity, $_repeat, $_edition);
    }
}