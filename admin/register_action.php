<?php
session_start();
require "database.php";
include "flash_data.php";
function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = test_data($_POST['name']);
$email = test_data($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$after_hash = password_hash($password, PASSWORD_DEFAULT);

// old data
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

if(empty($name)) {
    Flash_data::error("Enter Your Name");
    header('location:register.php');
} elseif (strlen($name) < 4) {
    Flash_data::error("Enter Your Valid Name");
    header('location:register.php');
} elseif (empty($email)) {
    Flash_data::error("Enter Your Email");
    header('location:register.php');
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    Flash_data::error("Enter Valid Email");
    header('location:register.php');
} elseif (empty($password)) {
    Flash_data::error("Enter Your Password");
    header('location:register.php');
} elseif (strlen($password) < 8) {
    Flash_data::error("At least 8 characters or more");
    header('location:register.php');

} elseif (empty($confirm_password)) {
    Flash_data::error("Enter Confirm Password");
    header('location:register.php');
} elseif ($password != $confirm_password) {
    Flash_data::error("Confirm Password Doesn't Match!");
    header('location:register.php');
} else {
    // check email exist
    $select_email = "SELECT COUNT(*) AS email_exist FROM `users` WHERE `user_email`='$email'";
    $select_email_result = mysqli_query($db_connection, $select_email);
    $after_assoc_email_exist = mysqli_fetch_assoc($select_email_result);
    if ($after_assoc_email_exist['email_exist'] == 1) {
        Flash_data::error("This email Already Exist");
        header('location:register.php');
    } else {
        $insert_data = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$name', '$email', '$after_hash')";
        $result = mysqli_query($db_connection, $insert_data);
        Flash_data::success("Register Success please Login");
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('location:login.php');
    }
}


?>