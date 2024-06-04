<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /Views/login.php');
    exit();
}


function isLoggedIn() {
    session_start(); // Begin sessie als dit nog niet het geval is.
    function isUserLoggedIn() {
        return (isset($_SESSION['gebruikersnaam']) || isset($_SESSION['baliemedewerker'])) && (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true);
      }
  }


