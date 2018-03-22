<?php
/**
 * Created by PhpStorm.
 * User: calin
 * Date: 3/17/2018
 * Time: 2:41 PM
 */

    $message = "";
    if(isset($_POST['submit'])) {
        $connection = new mysqli('localhost', 'root','','passwordhash');
        $username = $connection->real_escape_string($_POST['username']);
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);
        $cPassword = $connection->real_escape_string($_POST['cPassword']);

        if($password != $cPassword)
          $message = "Please Check Your Password!";
        else{
           $hash = password_hash($password, PASSWORD_BCRYPT);
           $connection->query("INSERT INTO users(username,email,password) VALUES ('$username','$email', '$hash')");
           $message = "You have been registered";
        }
    }
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
</head>
<body>
    <div class="reg-container" style="margin-top: 100px;">
        <div class="row-content">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src=""><br><br>
                <?php if($message != "") echo $message ."<br><br>"; ?>
                <form method="post" action="register.php">
                    <input class="form1" minlength="3" name="username" placeholder="Name..."><br>
                    <input class="form1" name="email" type="email" placeholder="Email..."><br>
                    <input class="form1" minlength="5" name="password" type="password" placeholder="Password..."><br>
                    <input class="form1" minlength="5" name="cPassword" type="password" placeholder="Confirm Password..."><br>
                    <input class="btn-primary" name="submit" type="submit" value="Register.."><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
