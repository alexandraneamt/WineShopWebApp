<?php
require_once 'User.php'; //Include the User.php file if it is not already included
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}
//Starts the users session on webpage/ starts storing things onto Cookie

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
//filter and strips unwanted characters in the username and password field


$errorMessage = array();//creates error message array to be stored

if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';
//creates error message and stores into the array for when the user leaves the username field blank
}
else {
    // execute a query to see if username is in the database
    $statement = $gateway->getUserByUsername($username);
    
    // if the username is in the database then add an error message
    // to the errorMessage array
    if ($statement->rowCount() !== 0) {
        $errorMessage['username'] = 'Username already registered<br/>';
    }
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';
//creates error message and stores into the array for when the user leaves the password field blank
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Password2 must not be blank<br/>';
//creates error message and stores into the array for when the user leaves the password2 field blank
}
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Passwords must match<br/>';
//creates error message and stores into the array for when password dont match
}

if (empty($errorMessage)) {
    $gateway->insertUser($username, $password);
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'register.php';
//if login unsuccessful , take the user to the register.php page where error message(s) will be displayed
}










