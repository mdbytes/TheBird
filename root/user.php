<?php require('library/session.inc'); ?>
<?php require('library/head_sec.inc'); ?>
<?php require('library/nav.inc'); ?>

<body>

    <main id="main-page" class="container">

        <div class="row">
            <div id="main-page-colOne" class="col-sm-3">
                <div style="padding:3%;">
                    <div style="font-weight:bold;width:100%;text-align:center;">Profile:</div>
                    <?php    
                    
                    require('library/connect.inc');
                    
                    $test = $_SESSION['email_one'];
                    $query = "SELECT * FROM users WHERE email_one = '$test'";
                    
                    $result = mysqli_query($connect,$query);
                    
                    if (!$result) {
                        
                        echo 'uh oh';
                        
                    } else {
                        
                        $row = mysqli_fetch_array($result);
                        echo '<div id="profile-info" style="width:100%;text-align:center;">';
                        if (trim($row['image_path']) === "avi/") {
                                    echo '<img src="avi/not_pictured.png" height="150" width="150"><br>';
                        } else {
                                   echo '<img src=';
                        echo $row['image_path'];
                        echo ' height = "150" width = "150">'.'<br>';
                        }
                        echo '<br>';
                        echo  $row['fname'].' '.$row['lname'].'<br>';
                        echo  $row['city'].', '.$row['state'].'<br>';
                        echo '</div>';
                            
                    }
                    
                    ?>
                    <form method="post" action="log_out.php" style="text-align:center;">
                        <button type="submit" class="btn btn-primary" style="margin-top:1em;">Log Out</button>
                    </form>
                </div>
            </div>
            <div id="main-page-colTwo" class="col-sm-6">
                <div style="padding:3%;">
                    <img src="images/bird-background.png" width="20%" style="float:left;">
                    <p style="font-family: 'Chewy', cursive;font-size:200%;color:gray;width:60%; float:left;margin-top:2em;margin-left:2em;">Get chirping today...</p>
                    <form method="post" enctype='multipart/form-data' action="message_proc.php">
                        <div class="form-group" style="clear:both;">
                            <label for="exampleFormControlTextarea1">Your Chirp Here:</label>
                            <textarea name="message" style="resize:none;" maxlength="168" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Here's where you chirp what's on your mind (up to 168 characters)" required></textarea>
                        </div>
                        <input type="hidden" name="user_num" value="<?php echo $row['user_num']; ?>">
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
                        /* Old query  "SELECT * FROM messages ORDER by time_date DESC LIMIT 35;";  */
                        $query = "SELECT * FROM messages INNER JOIN users on messages.user_num = users.user_num ORDER by time_date DESC LIMIT 35; ";
                        $result = mysqli_query($connect,$query);
                        
                        if (!$result) {
                            echo 'Error retrieving messages';
                        } else {
                            WHILE ($row = mysqli_fetch_array($result)) {
                                echo '<div class="message_box">';
                                echo '<hr width="90%" style="clear:both;">';
                                
                                if (trim($row['image_path']) === "avi/") {
                                    echo '<h5>User:</h5><img src="avi/not_pictured.png" height="100" width="100"><br>';
                                } else {
                                    echo '<h5>User:</h5><img src='.$row['image_path'].' height="100" width="100"><br>';
                                }
                                echo  $row['fname'].' '.$row['lname'].'<br>';
                                echo '<br><p>'.stripslashes($row['message']).'</p>';
                                if (trim($row['message_path']) === "message_img/") {
                                    /* echo 'no pic'; */
                                } else {
                                    echo '<a href="'.$row['message_path'].'" data-featherlight="'.$row['message_path'].'">';
                                    echo '<img src="'.$row['message_path'].'" alt="message pic" width="80%" class="message_pic">';
                                    echo '</a>';
                                }
                                echo '</div>';
                            }
                            
                        }
                        
                        ?>
                    </div>

                </div>
            </div>
            <div id="main-page-colThree" class="col-sm-3">
                <div class="row" style="padding:10%;">
                    <h3 style="width:100%;text-align:center;">Hashtags</h5><br>
                        <?php
                    $query = "SELECT * FROM messages JOIN users ON messages.user_num = users.user_num";
                    $result = mysqli_query($connect,$query);
                    
                    IF (!$result) {
                        echo 'uh oh';
                        
                    } else {
                        echo '<br>';
                        
                        if (mysqli_num_rows($result) == 0) {
                            echo 'No Hash For You!';
                        } else {
                            
                            WHILE ($row = mysqli_fetch_array($result)) {
                                
                            
                                $string = explode(' ',$row['message']);
                              	echo '<div style="width:70%;text-align:left;margin:0 auto;">';
                                FOR ($x=0; $x < count($string); $x++) {
                                    if (!preg_match_all('/#(\w+)/',$string[$x])) {
                                    } else {
                                        
                                        echo '<a href="#" data-featherlight="<p>'.$row['message'].'</p>">'.$string[$x].'</a>';
                                        echo '<br>';
                                      
                                        
                                    }
                                }
                                echo '</div>';
                            
                            }
                        }
                         
                        /*    print_r($result);  */
                    }
                    
                    ?>


                </div>
                <div class="row" style="padding:10%;">

                    <h3 style="width:100%;text-align:center;">Who to follow</h3>

                    <?php 
                    $query = "SELECT * FROM users ORDER BY RAND() LIMIT 4";
                    
                    $result = mysqli_query($connect,$query);
                    
                    if (!$result) {
                        
                        echo 'uh oh';
                    } else {
                        echo '<br>';
                        WHILE($rows = mysqli_fetch_array($result)) {
                            
                        
                        if (trim($rows['image_path']) === "avi/") {
                            echo '<div style="width:100%;text-align:center;">';
                                    echo '<br><img src="avi/not_pictured.png" height="150" width="150"><br>';
                                    echo  $rows['fname'].' '.$rows['lname'].'<br>';
                        echo  $rows['city'].' '.$rows['state'].'<br>';
                                    
                            echo '</div>';
                        } else {
                            echo '<div style="width:100%;text-align:center;">';
                                   echo '<br><img src=';
                        echo $rows['image_path'];
                        echo ' height = "150" width = "150">'.'<br><br>';
                        
                        
                        echo  $rows['fname'].' '.$rows['lname'].'<br>';
                        echo  $rows['city'].' '.$rows['state'].'<br>';
                            echo '</div>';
                        }
                    }
                    }
                    
                    
							?>







                </div>
            </div>
        </div>



    </main>




    <?php require('library/footer.inc'); ?>

    <?php
print($_SESSION['email_one']); 

?>
