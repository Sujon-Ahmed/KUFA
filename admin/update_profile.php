<?php
session_start();
require "database.php";
include "flash_data.php";

$user_id = $_POST['user_id'];
$name = $_POST['fullName'];
$about = $_POST['about'];
$company = $_POST['company'];
$job = $_POST['job'];
$country = $_POST['country'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

if(empty($name)) {
    Flash_data::error("Name Felid Are Required!");
    header('location:users-profile.php?user_id='.$user_id);
} elseif (empty($email)) {
    Flash_data::error("Email Felid Are Required!");
    header('location:users-profile.php?user_id='.$user_id);
} else {
    // update profile with image
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $old_image = $_POST['old_file'];
        $file_extension = explode('.',$file_name);
        $file_actual_extension = strtolower(end($file_extension));
        $allowed_extension = array('jpg', 'png', 'jpeg');
        if (in_array($file_actual_extension, $allowed_extension)) {
            if ($file_size < 1000000) {
                $file_error = $_FILES['file']['error'];
                if ($file_error == 0) {
                    $file_new_name = uniqid('',true).'.'.$file_actual_extension;
                    $file_destination = "assets/uploads/users/".$file_new_name;
                    move_uploaded_file($file_tmp_name, $file_destination);
                    unlink("assets/uploads/users/".$old_image);
                    $update_profile = "UPDATE `users` SET `user_name`='$name', `user_about`='$about',`user_phone`='$phone',`user_email`='$email',`user_photo`='$file_new_name', `user_job`='$job',`user_address`='$address',`user_country`='$country',`user_company`='$company' WHERE `user_id` = '$user_id'";
                    $update_profile_result = mysqli_query($db_connection, $update_profile);
                    Flash_data::success("Profile Update Success");
                    header('location:users-profile.php?user_id='.$user_id);
                } else {
                    Flash_data::error("File Error!");
                    header('location:users-profile.php?user_id='.$user_id);
                }
            } else {
                Flash_data::error("File Size too Large!");
                header('location:users-profile.php?user_id='.$user_id);
            }
        } else {
            Flash_data::error("Invalid Extension!");
            header('location:users-profile.php?user_id='.$user_id);
        }
    } else {
        // update profile without image
        $update_profile = "UPDATE `users` SET `user_name`='$name', `user_about`='$about',`user_phone`='$phone',`user_email`='$email', `user_job`='$job',`user_address`='$address',`user_country`='$country',`user_company`='$company' WHERE `user_id` = '$user_id'";
        $update_profile_result = mysqli_query($db_connection, $update_profile);
        Flash_data::success("Profile Update Success");
        header('location:users-profile.php?user_id='.$user_id);
    }
}
?>