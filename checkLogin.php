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
//filter and strips unwanted characters in the username and password field

$errorMessage = array(); //creates error message array to be stored

if ($username === FALSE || $username === '') { 
//creates error message and stores into the array for when the user leaves the username field blank
    $errorMessage['username'] = 'Username must not be blank<br/>';
}

if ($password === FALSE || $password === '') {
//creates error message and stores into the array for when the user leaves the password field blank
    $errorMessage['password'] = 'Password must not be blank<br/>';
}

if (empty($errorMessage)) {
    $statement = $gateway->getUserByUsername($username);
    if ($statement->rowCount() != 1) {
        $errorMessage['username'] = 'Username not registered<br/>';
    }
    else if ($statement->rowCount() == 1) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($password !== $row['password']) {
            $errorMessage['password'] = 'Invalid password<br/>';
        }
    }
}

if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header('Location: home.php');
    //if Login successful, take the user to the home.php
}
else {
    require 'login.php'; 
    //if login unsuccessful , take the user to the index.php page where error message will be displayed
}










