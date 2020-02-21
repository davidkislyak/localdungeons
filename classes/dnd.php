<?php
/**
 * Created in PhpStorm
 * @author Brian Kiehn
 * @date 2/21/2020
 * @version 1.0
 * dnd.php
 * GreenRiverDev
 * @link
 */


class dnd extends generic
{
    public function __construct($_name, $_host, $_gameName, $_genre, $_date, $_time, $_location, $_keywords = array(),
                                $_capacity = '50', $_repeat = false, $_edition = '5th')
    {
        $_type = 'RPG';
        parent::__construct($_name, $_host, $_gameName, $_genre, $_date, $_time, $_location, $_type, $_keywords,
            $_capacity, $_repeat, $_edition);
    }
}