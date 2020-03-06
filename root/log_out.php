<?php 

require 'library/session.inc';

if (isset($_SESSION['email_one'])) {
    session_destroy();
    session_unset();
    $_SESSION = array();
    header('location/index.php');
    
} else {
    header('location/index.php');
}



?>
