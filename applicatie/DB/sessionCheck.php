<?php
session_start();

function isLoggedIn()
{
    return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;
}


