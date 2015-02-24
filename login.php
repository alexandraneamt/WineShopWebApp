<?php
$id = session_id();
if ($id == "") {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?> <!--calls toolbar class and displays it  -->
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <!--If username is not set, then the username will be blank-->
        
        <form action="checkLogin.php" method="POST"> 
        <!--the 'action' attribute declares where the data on this form 
        will be sent to for validation, -->
        <!--The specified method in which the form data should be sent is set to 
        be sent as part of a HTTP POST request-->
            <table border="0">
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text"
                                   name="username"
                                   value="<?php echo $username; ?>" /> 
                            <!--Displays username which is already stored (joe)-->
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?> <!--Calls from the checkLogin.php and decides 
                                   whether to post error message or not-->
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
                                }
                                ?>
                                <!--Calls from the checkLogin.php and decides 
                                   wether to post error message or not-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Login" name="login" />
                            <input type="button"
                                   value="Register"
                                   name="register"
                                   onclick="document.location.href = 'register.php'"
                                   /> 
                                      <!--Once register button is clicked, 
                                      redirect user to the register.php page-->
                            <input type="button" value="Forgot Passward" name="forgot" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
