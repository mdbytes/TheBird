<?php

namespace views\home;
use app\controllers\PostController;
use app\controllers\UserController;
use app\views\home\UserHome;

$userController = new UserController();

$email = $_SESSION['email_one'];

$user = $userController->getUser($email);

$userHome = new UserHome($user);
?>
<main id="user-page" class="container-fluid">

    <div class="row">
        <div id="user-page-colOne" class="col-sm-3">
            <div>
                <?php
                $userHome->userProfile();

                ?>
            </div>
        </div>
        <div id="user-page-colTwo" class="col-sm-6">
            <div style="padding:3%;">
                <img src="<?php echo ROOT_DIR.'assets/images/bird-background.png' ?>" style="width:20%;float:left;">
                <p style="font-family: 'Chewy', cursive;font-size:200%;color:gray;width:60%; float:left;margin-top:2em;margin-left:2em;">
                    Get chirping today...</p>
                <form method="post" enctype='multipart/form-data' action="../../php/message_proc.php">
                    <div class="form-group" style="clear:both;">
                        <label for="exampleFormControlTextarea1">Your Chirp Here:</label>
                        <textarea name="message" style="resize:none;" maxlength="168" class="form-control"
                                  id="exampleFormControlTextarea1" rows="3"
                                  placeholder="Here's where you chirp what's on your mind (up to 168 characters)"
                                  required></textarea>
                    </div>

                    <input type="hidden" name="user_num" value="echo_user_id">
                    <div>
                        <label>Attach an image:&nbsp;</label>
                        <input name="message_img" type="file">

                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:1em;">Submit</button>

                </form>

                <hr width="90%" style="clear:both;">
                <br>
                <h4>Your Timeline</h4>
                <div class="timeline">
                    <?php
                    $postController = new PostController();

                    $posts = $postController->getPostsByEmail($email);

                    $userHome->timelinePosts($posts);

                    ?>
                </div>
            </div>

        </div>
        <div id="user-page-colThree" class="col-sm-3">
            <div id='hashtags' class="row"
                 style="margin: 10%; padding:10%; background-color: white;border: 1px solid black; border-radius: 10px;">
                <h3 style="width:100%;text-align:center;">Hashtags</h3><br>
                <?php
                echo 'populate hashtags';
                ?>


            </div>
            <div class="row"
                 style="margin: 10%; padding:10%; background-color: white;border: 1px solid black; border-radius: 10px;">

                <h3 style="width:100%;text-align:center;">Who to follow</h3>

                <?php
                echo 'populate who to follow';


                ?>


            </div>
        </div>
    </div>


</main>
