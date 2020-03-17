<?php

/**
 * Validates a username
 *
 * @param $username username to validate
 * @return bool true if valid
 */
function validUsername($username)
{
    return (!empty(trim($username)) && ctype_alpha($username)
        && strlen($username) > 3 && strlen($username) < 46);
}

/**
 * Validates a password
 *
 * @param $password password to validate
 * @return bool true if valid
 */
function validPassword($password)
{
    return (!empty(trim($password)) && ctype_alnum($password)
        && strlen($password) > 7 && strlen($password) < 129);
}


/**
 * @param $db databaseObject for verification step
 * @param $username to validate
 * @param $password to validate
 * @return bool true if user exists with combination
 */
function validAccount($db, $username, $password)
{
    return (ctype_digit(trim($db->getUserId($username, $password))));
}
