<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/wine.js"></script>
        <!--relates to the register.js file. This file will decide wether or not the details entered should be stored or not -->
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Wine Form</h1>
        <?php  
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
       
        <form id="createWineForm" action="createWine.php" method="POST">
             <!--the 'action' attribute declares where the data on this form 
        will be sent to for validation, -->
        <!--The specified method in which the form data should be sent is set to 
        be sent as part of a HTTP POST request-->
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                ?>" />
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                    //checks if there are any errors in the name field 
                                    // displays username error message
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                    //checks if there are any errors in the username field 
                                    // displays username error messagev
                                }
                                ?>" />
                            <span id="descriptionError" class="error">
                                 <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['description'];
                                }
                                ?>
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            <input type="text" name="year" value="<?php
                                if (isset($_POST) && isset($_POST['year'])) {
                                    echo $_POST['year'];
                                }
                                ?>" />
                            <span id="yearError" class="error">
                                 <?php
                                if (isset($_POST) && isset($_POST['year'])) {
                                    echo $_POST['year'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="type" value="<?php
                                if (isset($_POST) && isset($_POST['type'])) {
                                    echo $_POST['type'];
                                }
                                ?>" />
                            <span id="typeError" class="error">
                                 <?php
                                if (isset($errorMessage) && isset($errorMessage['type'])) {
                                    echo $errorMessage['type'];
                                }
                                ?>
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Serving Temperature</td>
                        <td>
                            <input type="text" name="servingTemp" value="<?php
                                if (isset($_POST) && isset($_POST['servingTemp'])) {
                                    echo $_POST['servingTemp'];
                                }
                                ?>" />
                            <span id="servingTempError" class="error">
                                 <?php
                                if (isset($errorMessage) && isset($errorMessage['servingTemp'])) {
                                    echo $errorMessage['servingTemp'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    
                       
                   
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Wine" name="createWine" />
                        </td>
                    </tr>
                </tbody>
            </table>
                
        </form>
    </body>
</html>

