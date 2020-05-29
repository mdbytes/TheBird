<?php require('library/session.inc'); ?>

<?php require('library/connect.inc'); ?>

<?php
print_r($_POST);

$search_item = $_POST['search_item'];

$query = "SELECT * FROM messages, JOIN users ON messages.user_num = users.user_num WHERE CONCAT(fname,lname, message, email_one, address, city, state, zip) LIKE '%$search_item%' ";

$result = mysqli_query($connect, $query);




if (!$result) {
    echo 'The Query Did Not Run';
} else {
    echo 'Alright';
    
    WHILE ($rows = mysqli_fetch_array($result)) {
        echo '<p>'.$rows['fname'].'</p>';
    }
    
}





?>
