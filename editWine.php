<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}


//echo '<pre>';
//print_r($_POST);
//echo '</pre>';


require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$servingTemp = filter_input(INPUT_POST, 'servingTemp', FILTER_SANITIZE_NUMBER_INT);

$gateway->updateWine($id, $name, $description, $year, $type, $servingTemp);



header('Location: home.php');
