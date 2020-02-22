<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/22/2020
 * @version 1.0
 * soc.php
 * GreenRiverDev
 * @link https://github.com/davidkislyak/localdungeons.git
 */


class soc extends generic
{
    public function __construct($_name, $_host, $_date, $_time, $_location, $_genre = 'medieval',$_keywords = array(),
                                $_capacity = '24', $_repeat = false, $_edition = 'base game')
    {
        $_gameName = 'Settlers of Catan';
        $_type = 'Board game';
        parent::__construct($_name, $_host, $_gameName, $_genre, $_date, $_time, $_location, $_type, $_keywords,
            $_capacity, $_repeat, $_edition);
    }
}