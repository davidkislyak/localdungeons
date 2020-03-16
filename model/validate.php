<?php

require_once('validate-functions.php');

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

function validLogin($db)
{
    //zas is crazy
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