<?php

namespace app\models\data;

class PostDatabase
{
    public static function getFourRandomPosts($user)
    {
        $db = new DatabaseConnect();

        $query = "SELECT * FROM users ORDER BY RAND() LIMIT 4";

        $result = mysqli_query($db->connect, $query);

        $db->connect->close();

        if (mysqli_num_rows($result) > 0) {
            $posts = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($posts, $row);
            }
            return $posts;
        } else {
            return null;
        }

    }


    public static function getPostsByEmail(string $email): array | null
    {
        $db = new DatabaseConnect();

        $user = UserDatabase::getUser($email);

        $userId = $user->id;


        $query = "SELECT * FROM messages INNER JOIN users on messages.user_num = '$userId' ORDER by time_date DESC LIMIT 35;";

        $result = mysqli_query($db->connect, $query);

        $db->connect->close();

        if (mysqli_num_rows($result) > 0) {
            $posts = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($posts, $row);
            }

            return $posts;
        } else {
            return null;
        }
    }

    public static function addPost(): void
    {

        $db = new DatabaseConnect();

        if (!isset($_POST)) {
            header('location: index.php');
        } else {

            $message = addslashes($_POST['message']);

            $user_num = $_POST['user_num'];

            $message_path = 'message_img/'.$_FILES['message_img']['name'];
            $image_size = $_FILES['message_img']['size'];

            move_uploaded_file($_FILES['message_img']['tmp_name'],$message_path);


            $query = "INSERT INTO messages (user_num, message, message_path,time_date) VALUES ('$user_num','$message','$message_path',CURRENT_TIMESTAMP)";

            $result = mysqli_query($db->connect,$query);

            if (!$result) {
                echo 'uh oh';


            } else {

                header('location: user.php');
            }
        }

    }
}


?>