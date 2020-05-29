<?php

session_start();

if (!isset($_SESSION['email_one'])) {
    header('location:index.php');
} else {
    /* echo 'Session has been set'; */

}