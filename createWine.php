<?php
require_once 'Wine.php'; //includes the wine class file if it hasnt already been included
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$servingTemp = filter_input(INPUT_POST, 'servingTemp', FILTER_SANITIZE_NUMBER_INT);

$errorMessage = array();
//create error message array

if ($name === FALSE || $name === '') {
    $errorMessage['name'] = 'Name cannot be empty\n';
//creates error message and stores into the array for when the user leaves the name field blank
}

if ($description === FALSE || $description === '') {
    $errorMessage['description'] = 'Description cannot be empty\n';
//creates error message and stores into the array for when the user leaves the description field blank
}

if ($year === FALSE || $year === '') {
    $errorMessage['year'] = 'year cannot be empty\n';
//creates error message and stores into the array for when the user leaves the year field blank
}

if ($type === FALSE || $type === '') {
    $errorMessage['type'] = 'Type cannot be empty\n';
//creates error message and stores into the array for when the user leaves the type field blank
  
}

if ($servingTemp === FALSE || $servingTemp === '') {
    $errorMessage['servingTemp'] = 'Serving Temperature cannot be empty\n';
//creates error message and stores into the array for when the user leaves the serving Temperature field blank
}


if (empty($errorMessage)) {
    $id = $gateway->insertWine($name, $description, $year, $type, $servingTemp);
    $message = "Wine created successfully" ;   
    //if form is successful, take the user to the home.php
    header('Location: home.php');
}
else {
    require 'createWineForm.php';
}




