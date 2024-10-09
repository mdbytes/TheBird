<?php

namespace app\controllers;

use app\models\data\UserDatabase;use app\models\User;

class UserController {


    public function __construct() {

        // making controller
    }

    public function userSignIn(): void
    {
        UserDatabase::userSignIn();

    }

    public function getUser(mixed $email): User | null
    {
        return UserDatabase::getUser($email);
    }

    public function userSignOut():void {
        if (isset($_SESSION['email_one'])) {
            session_destroy();
            session_unset();
            $_SESSION = array();
            header('Location: /TheBird');
        } else {
            header('Location: /TheBird');
        }
    }

    public function setUpProfile(string $email): void
    {
        $user = $this->getUser($email);
        $user->userProfile();

    }

    public function userSignUp(): void {
        UserDatabase::userSignUp();
    }
}

?>
