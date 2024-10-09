<?php

namespace app\models\data;

use mysqli;

class DatabaseConnect
{
    public mysqli $connect;

    public function __construct() {
        $this->connect = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
        if ($this->connect->connect_error) {
            echo "Not connected, error: " . $this->connect->connect_error;
            die("Database connection error");
        }
        else
        {
            // echo "Connected.";
        }

    }

    public function getConnect(): mysqli
    {
        return $this->connect;
    }

    public function setConnect(mysqli $connect): void
    {
        $this->connect = $connect;
    }



}