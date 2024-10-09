<?php

namespace app\controllers;

class SiteNavigation
{

    public function __construct()
    {
    }

    public function navigate($action): void
    {
        switch ($action) {

            case "user_login":
                echo 'hello user login';
                $userController = new UserController();
                if(isset($_POST)) {
                    $userController->userSignIn();
                } else {
                    require('app/views/welcome/main_home.php');
                }
                break;

            case "user_home":
                require('app/views/home/user_home.php');
                break;

            case "user_registration":
                $userController = new UserController();
                if(isset($_POST)) {
                    $userController->userSignUp();
                } else {
                    require('app/views/welcome/main_home.php');
                }
                break;

            case "user_logout":
                $userController = new UserController();
                $userController->userSignOut();
                break;

            default:
                require('app/views/welcome/main_home.php');
                break;

        }
    }


}

?>