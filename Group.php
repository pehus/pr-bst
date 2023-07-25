<?php

use Person;

class Group 
{
    private static $instance = null;
    private $people = array();

    private function __construct() 
    {
        // Private constructor
    }

    public static function getInstance() 
    {
        if (self::$instance === null) 
        {
            self::$instance = new Group();
        }

        return self::$instance;
    }

    public function loadFromDataFile($filePath) 
    {
        $data = file_get_contents($filePath);
        $records = preg_split('/\n\n/', $data, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($records as $record) 
        {
            list($name, $gender, $birthDateStr) = explode("\n", $record);
            list($firstName, $lastName) = explode(" ", $name);

            $person = new Person(count($this->people) + 1, $firstName, $lastName, trim($gender), trim($birthDateStr));
            $this->people[$person->getID()] = $person;
        }
    }

    public function getPersonById($id) 
    {
        return isset($this->people[$id]) ? $this->people[$id] : null;
    }

    public function getPercentageByGender($gender) 
    {
        $total_people = count($this->people);
        if ($total_people === 0) 
        {
            return 0;
        }

        $genderCount = 0;
        foreach ($this->people as $person) 
        {
            if ($person->getGender() === $gender) 
            {
                $genderCount++;
            }
        }

        return ($genderCount / $totalPeople) * 100;
    }

    public function iterate()
    {
        foreach ($this->people as $person) 
        {
            echo "ID: " . $person->getId() . "<br>";
            echo "Name: " . $person->getFirstName() . " " . $person->getLastName() . "<br>";
            echo "Gender: " . $person->getGender() . "<br>";
            echo "Birth Date: " . $person->getBirthDate()->format('d.m.Y') . "<br>";
            echo "Days Alive: " . $person->getDaysAlive() . "<br>";
        }
    }
}