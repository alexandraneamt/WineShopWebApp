<?php
require_once 'Wine.php'; //calls the wine class
require_once 'WineTableGateway.php'; //calls winetablegateway class so that view edit delete can work
require_once 'Connection.php';       //calls connection class which accesses and connects to specified database
require 'ensureUserLoggedIn.php';    //call ensureuselogged in so that itonly displays content if user is logged in

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);
$wines = $gateway->getWines();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/wine.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>'; //if a message is set , then display it (there is no message)
        }
        ?> 
        <table>
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Year</th>
                    <th>Type</th>
                    <th>Serving Temperature</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $wine = $wines->fetch(PDO::FETCH_ASSOC); //get the PDO object connect and display content
                while ($wine) {
                    echo '<tr>';
                    echo '<td>' . $wine['name'] . '</td>'; //calls from the wines array and displays in the table
                    echo '<td>' . $wine['description'] . '</td>';
                    echo '<td>' . $wine['year'] . '</td>';
                    echo '<td>' . $wine['type'] . '</td>';
                    echo '<td>' . $wine['servingTemp'] . '</td>';
                    echo '<td>';
                    echo '<a href="viewWine.php?id=' . $wine['id'] . '">View</a> ';
                    echo '<a href="editWineForm.php?id=' . $wine['id'] . '">Edit</a> ';
                    echo '<a class="deleteWine" href="deleteWine.php?id=' . $wine['id'] . '">Delete</a> ';
                    echo '</td>';
                    echo '</tr>';
                    $wine = $wines->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineForm.php">Create Wine</a></p>
    </body>
</html>
