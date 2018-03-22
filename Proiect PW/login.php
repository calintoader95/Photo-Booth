<?php
/**
 * Created by PhpStorm.
 * User: calin
 * Date: 3/17/2018
 * Time: 3:36 PM
 */

$message = "";

if(isset($_POST['submit'])) {
    $connection = new mysqli('localhost', 'root','','passwordhash');
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    $sql = $connection->query("SELECT id, password FROM users WHERE email='$email'");
    if($sql->num_rows > 0){
        $data = $sql->fetch_array();
        if(password_verify($password, $data['password'])) {
            $message = "You have been logged IN!";
        }else
            $message = "Please check your inputs!";
    }else
        $message = "Please check your inputs!";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/cssAuth.css">


</head>
<body>
<div class="reg-container" style="margin-top: 100px;">
            <img class="poza" src="images/user.png"><br><br>
            <h2>Log In Here</h2>
            <?php if($message != "") echo $message ."<br><br>"; ?>
            <form method="post" action="login.php">
                <input class="form1" name="email" type="email" placeholder="Email..."><br>
                <input class="form1" minlength="5" name="password" type="password" placeholder="Password..."><br>
                <input class="btn-primary" name="submit" type="submit" value="Log In.."><br>
            </form>
</div>
</body>
</html>
