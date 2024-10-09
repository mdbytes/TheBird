<?php

namespace app\controllers;
use app\models\data\BirdDatabase;
use app\models\data\PostDatabase;

class PostController
{

    public function __construct()
    {

    }

    public function getPosts()
    {
        // return all posts
    }

    public function getPostsByEmail($email): ?array
    {
        return PostDatabase::getPostsByEmail($email);

    }


}


?>