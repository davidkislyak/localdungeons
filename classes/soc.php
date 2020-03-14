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


class Soc extends GenericGame
{
    public function __construct($_name, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'Medieval',
                                $_tags = array(), $_capacity = '0', $_edition = '')
    {
        $_gameName = 'Settlers of Catan '.$_edition;
        $_type = 'Board game';
        parent::__construct($_gameName, $_name, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }
}