<?php 

require 'library/session.inc';

if (isset($_SESSION['email_one'])) {
    session_destroy();
    session_unset();
    $_SESSION = array();
    header('Location: /');
    
} else {
    header('Location: /');
}



?>
