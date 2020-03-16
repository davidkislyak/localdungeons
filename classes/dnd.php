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
                                $_tags = array(), $_capacity = '0', $_edition = '5E')
    {
        $_gameName = 'Dungeons & Dragons '.$_edition;
        $_type = 'RPG';
        parent::__construct($_gameName, $_name, $_host, $_date, $_time, $_city, $_zip, $_street, $_genre, $_type,
            $_tags, $_capacity);
    }

    public function getTags()
    {
        return parent::getTags();
    }

}
