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
