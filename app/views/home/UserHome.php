<?php

namespace app\views\home;

use app\models\User;

class UserHome
{

    public User $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    function userProfile():void {

        ?>
        <div style="font-weight:bold;width:100%;text-align:center;">Profile:</div>
        <div id="profile-info" style="width:100%;text-align:center;">
            <img src="<?php echo ROOT_DIR."assets/".$this->user->imagePath ?>" height="150" width="150"><br>
            <br><?php echo $this->user->firstName." ".$this->user->lastName ?>
            <br><?php echo $this->user->city.", ".$this->user->state ?><br></div>
        <form method="post" action="http://localhost/TheBird/index.php?action=user_logout" style="text-align:center;">
            <button type="submit" class="btn btn-primary" style="margin-top:1em;">Log Out</button>
        </form>
        <?php
    }

    public function timelinePosts($posts):void
    {
        if (!$posts) {
            echo 'Error retrieving messages';
        } else {
            foreach ($posts as $row) {
                echo '<hr width="90%" style="clear:both;">';

                if (trim($row['image_path']) === "avi/") {
                    $imgUrl = ROOT_DIR."assets/avi/not_pictured.png";
                    echo '<div class="user-image">';
                    echo "<img src='$imgUrl' height='100' width='100'><br>";
                } else {
                    echo '<div class="user-image">';
                    echo '<img src=' .ROOT_DIR.'assets/'. $row['image_path'] . ' height="100" width="100"><br>';

                }
                echo '<h4>' . $row['fname'] . ' ' . $row['lname'] . '</h4>';
                echo '</div>';
                echo '<div class="message-content">';
                echo '<br><p>' . stripslashes($row['message']) . '</p>';
                if (trim($row['message_path']) === "message_img/") {
                    /* echo 'no pic'; */
                } else {
                    echo "<a href=".ROOT_DIR.'assets/'. $row['message_path'] . '."data-featherlight="'. $row['message_path'].">";
                    echo "<img src=".ROOT_DIR.'assets/'. $row['message_path'] . ' alt="message pic" class="message_pic">';
                    echo '</a>';
                }
                echo '</div>';
            }

        }

    }


}