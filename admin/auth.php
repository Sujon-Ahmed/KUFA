<?php
session_start();
require "database.php";
include 'flash_data.php';
// assign variables
$email = $_POST['email'];
$password = $_POST['password'];

// email retrieves
$select_email = "SELECT COUNT(*) AS `email_retrieves`, `user_id`, `user_name` FROM `users` WHERE `user_email` = '$email'";
$select_email_result = mysqli_query($db_connection, $select_email);
$after_assoc_email_retrieves = mysqli_fetch_assoc($select_email_result);

// check email retrieves true or false
if ($after_assoc_email_retrieves['email_retrieves'] == 1) {
    $select_db_email = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $select_db_email_result = mysqli_query($db_connection, $select_db_email);
    $after_assoc_db = mysqli_fetch_assoc($select_db_email_result);
    // password verify
    if (password_verify($password, $after_assoc_db['user_password'])) {
        $_SESSION['welcome_admin'] = "Welcome to Admin Dashboard";
        $_SESSION['user_id'] = $after_assoc_db['user_id'];
        $_SESSION['user_name'] = $after_assoc_db['user_name'];
        header('location:index.php');
    } else {
        Flash_data::error("Invalid Password!");
        header('location:login.php');
    }
} else {
    Flash_data::error("Invalid Email");
    header('location:login.php');
}


?>