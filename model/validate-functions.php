<?php

//--login/signup functions--
function validUsername($username)
{
    return (!empty(trim($username)) && ctype_alpha($username)
        && strlen($username) > 3 && strlen($username) < 46);
}

function validPassword($password)
{
    return (!empty(trim($password)) && ctype_alnum($password)
        && strlen($password) > 7 && strlen($password) < 129);
}

function validAccount($db, $username, $password)
{
    return (ctype_digit(trim($db->getUserId($username, $password))));
}

//--search functions--
function validGenre($genre)
{
    //TODO
}