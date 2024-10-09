<?php

namespace app\models\data;

use app\models\User;
use mysqli;

class UserDatabase
{

    public static function userSignIn(): void
    {
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));

        $db = new DatabaseConnect();
        $query = "SELECT * FROM users WHERE email_one = '$email' AND pass_one = '$password'";
        $result = mysqli_query($db->connect, $query);

        $db->connect->close();

        if (!$result) {
            header('location:index.php');

        } elseif (mysqli_num_rows($result) != 1) {
            header('location:index.php');
        } else {
            $row = mysqli_fetch_array($result);
            $_SESSION['email_one'] = $row['email_one'];
            header('location:index.php?action=user_home');
        }
    }

    public static function getUser($email): User|null
    {
        $db = new DatabaseConnect();

        $query = "SELECT * FROM users WHERE email_one = '$email'";
        $result = mysqli_query($db->connect, $query);

        $db->connect->close();

        if (!$result) {
            header('location:index.php');

        } elseif (mysqli_num_rows($result) != 1) {
            header('location:index.php');
        } else {
            $row = mysqli_fetch_array($result);
            return new User($row['user_num'], $row['email_one'], $row['pass_one'], $row['fname'], $row['lname'], $row['address'], $row['city'], $row['state'], $row['zip'], $row['image_path']);
        }

        return null;
    }

    public static function getUserById($id): User|null
    {
        $db = new DatabaseConnect();

        $query = "SELECT * FROM users WHERE user_num = '$id'";
        $result = mysqli_query($db->connect, $query);

        $db->connect->close();

        if (!$result) {
            header('location:index.php');

        } elseif (mysqli_num_rows($result) != 1) {
            header('location:index.php');
        } else {
            $row = mysqli_fetch_array($result);
            return new User($row['user_num'], $row['email_one'], $row['pass_one'], $row['fname'], $row['lname'], $row['address'], $row['city'], $row['state'], $row['zip'], $row['image_path']);
        }

        return null;
    }

    public static function userSignUp(): void {

        $db = new DatabaseConnect();

        if (!$db->connect) {
            die('No connection at this time!');
        } else {
            echo 'You are now connected to the database'.'<br>';

            /* Confirm that a form has been submitted with data  */
            if (!isset($_POST)) {
                header('location:index.php');
            } else {
                print_r($_POST);
                echo '<br>';
                echo $_FILES['my_image']['name'];
                echo '<br>';

                /* Read in and process data  */
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email_one = $_POST['email_one'];
                $email_two = $_POST['email_two'];
                $password_one = trim($_POST['password_one']);
                $password_two = trim($_POST['password_two']);
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $image_size = $_FILES['my_image']['size'];
                $image_path = 'avi/'.$_FILES['my_image']['name'];

                echo $image_path.'<br>';

                /* Verify email address and password before proceeding  */
                if ($email_one != $email_two || $password_one != $password_two) {
                    header('location:index.php');
                } else {

                    if($image_size <=0) {

                    } else {
                        move_uploaded_file($_FILES['my_image']['tmp_name'],$image_path);
                    }
                    $password_one = md5($password_one);

                    $query = "INSERT INTO users (email_one, pass_one, fname, lname, address, city, state, zip, image_path) VALUES  ('$email_one', '$password_one', '$fname', '$lname', '$address', '$city', '$state', '$zip','$image_path');";
                    $result = mysqli_query($db->connect,$query);
                    if(!$result) {
                        echo 'No data written to database.  Try again later.';
                    } else {

                        $db->connect->close();
                        header('location:index.php');
                        echo 'New user data successfully written to the database - you are awesome!';
                    }
                }
            }
        }
    }
}

?>