<?php

$group = Group::getInstance();
$group->loadFromDataFile('data.txt');

$person = $group->getPersonById(1);

if ($person) 
{
    echo "Person with ID $personID found:<br>";
    echo "Name: " . $person->getFirstName() . " " . $person->getLastName() . "<br>";
    echo "Gender: " . $person->getGender() . "<br>";
    echo "Birth Date: " . $person->getBirthDate()->format('d.m.Y') . "<br>";
    echo "Days Alive: " . $person->getDaysAlive() . "<br>";
} 
else 
{
    echo "Person with ID $personID not found.<br>";
}

$malePercentage = $group->getPercentageByGender('M');
$femalePercentage = $group->getPercentageByGender('F');
echo "Percentage of Males: " . $malePercentage . "<br>";
echo "Percentage of Females: " . $femalePercentage . "<br>";