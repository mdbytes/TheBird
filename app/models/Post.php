<?php

namespace app\models;

class Post
{
    public $id;
    public $userId;
    public $postText;
    public $postImagePath;
    public $postDateTime;

    /**
     * @param $id
     * @param $userId
     * @param $postText
     * @param $postImagePath
     * @param $postDateTime
     */
    public function __construct($id, $userId, $postText, $postImagePath, $postDateTime)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->postText = $postText;
        $this->postImagePath = $postImagePath;
        $this->postDateTime = $postDateTime;
    }


}

?>