<?php

namespace app\models;
class User
{

    public $id;
    public $emailAddress;
    public $password;
    public $firstName;
    public $lastName;
    public $streetAddress;
    public $city;
    public $state;
    public $zip;
    public $imagePath;

    /**
     * @param $id
     * @param $emailAddress
     * @param $password
     * @param $firstName
     * @param $lastName
     * @param $streetAddress
     * @param $city
     * @param $state
     * @param $zip
     * @param $imagePath
     */
    public function __construct($id, $emailAddress, $password, $firstName, $lastName, $streetAddress, $city, $state, $zip, $imagePath)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->imagePath = $imagePath;
    }




}

?>