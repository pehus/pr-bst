<?php

use DateTime;

class Person {

    private int $id;
    private string $firstName;
    private string $lastName;
    private string$gender;
    private DateTime $birthDate;

    public function __construct($id, $firstName, $lastName, $gender, $birthDate) 
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->last_name = $lastName;
        $this->gender = $gender;
        $this->birthDate = DateTime::createFromFormat('d.m.Y', $birthDate);
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getFirstName() 
    {
        return $this->firstName;
    }

    public function getLastName() 
    {
        return $this->lastName;
    }

    public function getGender() 
    {
        return $this->gender;
    }

    public function getBirthDate() 
    {
        return $this->birthDate;
    }

    public function getDaysAlive() 
    {
        $currentDate = new DateTime();
        $interval = $currentDate->diff($this->birthDate);

        return $interval->days;
    }
}