<?php
$id = session_id();
if ($id == "") {
    session_start();
} //starts session and starts saving info into a cookie

if (isset($_SESSION['username'])) { //if user is logged in
    echo '<p><a href="home.php">Home</a></p>'; //display Home
    echo '<p><a href="logout.php">Logout</a></p>'; //display Logout in the toolbar
}
else { ////if there is no user logged in
    echo '<p><a href="index.php">Home</a></p>';  //display Home
    echo '<p><a href="login.php">Login</a></p>'; //display login(and redirect to pages if selected)
}