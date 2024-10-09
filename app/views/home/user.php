<?php namespace views\home; ?>

<?php use app\controllers\UserController; ?>

<?php require('app/controllers/UserController.php'); ?>
<?php require('app/controllers/PostController.php'); ?>

<main id="user-page" class="container-fluid">

    <div class="row">
        <div id="user-page-colOne" class="col-sm-3">
            <div>
                <div style="font-weight:bold;width:100%;text-align:center;">Profile:</div>
                <?php

                $userController = new UserController();
                print_r($_SESSION);
                $email = $_SESSION['email_one'];


                $user = $userController->setUpProfile($email);

                ?>
                <form method="post" action="../../php/log_out.php" style="text-align:center;">
                    <button type="submit" class="btn btn-primary" style="margin-top:1em;">Log Out</button>
                </form>
            </div>
        </div>
        <div id="user-page-colTwo" class="col-sm-6">
            <div style="padding:3%;">
                <img src="../../../assets/images/bird-background.png" width="20%" style="float:left;">
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
                    <input type="hidden" name="user_num" value="<?php echo $user->id; ?>">
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

                    $posts = $postController->pdo->getPostsByUserEmail($_SESSION['email_one']);

                    if (!$posts) {
                        echo 'Error retrieving messages';
                    } else {
                        foreach ($posts as $row) {
                            echo '<hr width="90%" style="clear:both;">';

                            if (trim($row['image_path']) === "avi/") {
                                echo '<div class="user-image">';
                                echo '<img src="../../../assets/avi/not_pictured.png" height="100" width="100"><br>';
                            } else {
                                echo '<div class="user-image">';
                                echo '<img src=' . $row['image_path'] . ' height="100" width="100"><br>';

                            }
                            echo '<h4>' . $row['fname'] . ' ' . $row['lname'] . '</h4>';
                            echo '</div>';
                            echo '<div class="message-content">';
                            echo '<br><p>' . stripslashes($row['message']) . '</p>';
                            if (trim($row['message_path']) === "message_img/") {
                                /* echo 'no pic'; */
                            } else {
                                echo '<a href="' . $row['message_path'] . '" data-featherlight="' . $row['message_path'] . '">';
                                echo '<img src="' . $row['message_path'] . '" alt="message pic" class="message_pic">';
                                echo '</a>';
                            }
                            echo '</div>';
                        }

                    }

                    ?>
                </div>
            </div>

        </div>
        <div id="user-page-colThree" class="col-sm-3">
            <div id='hashtags' class="row"
                 style="margin: 10%; padding:10%; background-color: white;border: 1px solid black; border-radius: 10px;">
                <h3 style="width:100%;text-align:center;">Hashtags</h3><br>
                <?php
                $postController = new PostController();

                $posts = $postController->pdo->getPostsByUserId($_SESSION['user_id']);


                if (!$posts) {
                    echo 'uh oh';

                } else {

                    foreach ($posts as $row) {


                        $string = explode(' ', $row['message']);
                        echo '<div style="width:90%;text-align:left;margin:0 auto;">';
                        for ($x = 0; $x < count($string); $x++) {
                            if (!preg_match_all('/#(\w+)/', $string[$x])) {
                            } else {

                                echo '<a href="#" data-featherlight="<p>' . $row['message'] . '</p>">' . $string[$x] . '</a>';
                                echo '<br>';


                            }
                        }
                        echo '</div>';

                    }


                    /*    print_r($result);  */
                }

                ?>


            </div>
            <div class="row"
                 style="margin: 10%; padding:10%; background-color: white;border: 1px solid black; border-radius: 10px;">

                <h3 style="width:100%;text-align:center;">Who to follow</h3>

                <?php
                $postController = new PostController();

                $posts = $postController->pdo->getPostsByUserId($_SESSION['user_id']);

                if (!$posts) {
                    echo 'uh oh';
                } else {
                    echo '<br>';
                    foreach ($posts as $rows) {


                        if (trim($rows['image_path']) === "avi/") {
                            echo '<div style="width:100%;text-align:center;">';
                            echo '<br><img src="../../../assets/avi/not_pictured.png" height="150" width="150"><br>';
                            echo $rows['fname'] . ' ' . $rows['lname'] . '<br>';
                            echo $rows['city'] . ' ' . $rows['state'] . '<br>';

                            echo '</div>';
                        } else {
                            echo '<div style="width:100%;text-align:center;">';
                            echo '<br><img src=';
                            echo $rows['image_path'];
                            echo ' height = "150" width = "150">' . '<br><br>';


                            echo $rows['fname'] . ' ' . $rows['lname'] . '<br>';
                            echo $rows['city'] . ' ' . $rows['state'] . '<br>';
                            echo '</div>';
                        }
                    }
                }


                ?>


            </div>
        </div>
    </div>


</main>
