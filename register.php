<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <form id="registerForm" action="checkRegister.php" method="POST"> 
        <!--the data on this form (action) will be sent to the checkregister.php file for validation-->
        <!--The specified method in which the form data should be sent is set to 
        be sent as part of a HTTP POST request-->
            <table border="0">
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="" />
                            <span id="usernameError" class="error"> 
                                
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                    //checks if there are any errors in the username field 
                                    // displays username error message 
                                }
                                ?> 
                            </span> 
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password']; 
                                    ////checks if there are any errors in the  first password field 
                                    // displays password error message 
                                }
                                ?>
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type="password" name="password2" value="" />
                            <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                    //checks if there are any errors in the password2 field 
                                    // displays password2 error message 
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Register" name="register" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <script type="text/javascript" src="js/register.js"></script> 
        <!--relates to the register.js file. This file will decide wether or not the details entered should be stored or not -->
    </body>
</html>
