<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /Views/login.php');
    exit();
}
?>
