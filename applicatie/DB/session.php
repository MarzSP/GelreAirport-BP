<?php

function isLoggedIn() {
    session_start(); // Begin sessie als dit nog niet het geval is.
    return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
  }
