<?php

require_once('validate-functions.php');

/**
 * Validates a new account submission
 *
 * @return bool true if new account values are valid
 */
function validNewAccount()
{
    global $f3;
    $isValid = true;

    if (!validUsername($f3->get('username'))) {
        $isValid = false;
        $f3->set("errors['username']", "Please enter a 4-46 character long alphabetic password.");
    }

    if (!validPassword($f3->get('password'))) {
        $isValid = false;
        $f3->set("errors['password']", "Please enter a 8-128 long alpha numeric character password.");
    }

    if ($f3->get('passwordConfirm') != $f3->get('password')) {
        $isValid = false;
        $f3->set("errors['passwordconfirm']", "Passwords do not match.");
    }

    return $isValid;
}

/**
 * Checks to see if username and password combo are valid.
 *
 * @param $db databaseObject for verification step
 * @return bool true if the login is valid
 */
function validLogin($db)
{
    global $f3;
    $isValid = true;

    if (!validUsername($f3->get('username'))) {
        $isValid = false;
        $f3->set("errors['login']", "Username or Password is invalid.");
    }

    if (!validPassword($f3->get('password'))) {
        $isValid = false;
        $f3->set("errors['login']", "Username or Password is invalid.");
    }

    if (!validAccount($db, $f3->get('username'), $f3->get('password'))) {
        $isValid = false;
        $f3->set("errors['login']", "Username or Password is invalid.");
    }

    return $isValid;
}

/**
 * Validates a password input
 *
 * @return bool true if valid password
 */
function validNewPassword()
{
    global $f3;
    $isValid = true;

    if (!validPassword($f3->get('password'))) {
        $isValid = false;
        $f3->set("errors['password']", "Please enter a 4-46 character long alphabetic password.");
    }

    if ($f3->get('passwordConfirm') != $f3->get('password')) {
        $isValid = false;
        $f3->set("errors['passwordconfirm']", "Passwords do not match.");
    }

    return $isValid;
}