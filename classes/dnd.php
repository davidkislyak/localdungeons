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


class Dnd extends GenericGame
{
    public function __construct($_name, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre = 'fantasy',
                                $_keywords = array(), $_capacity = '0', $_repeat = false, $_edition = '5th')
    {
        $_gameName = 'Dungeons & Dragons';
        $_type = 'RPG';
        parent::__construct($_name, $_host, $_gameName, $_genre, $_date, $_time, $_city, $_zip, $_street, $_type,
            $_keywords, $_capacity, $_repeat, $_edition);
    }
}