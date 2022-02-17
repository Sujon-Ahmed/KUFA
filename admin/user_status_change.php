<?php
require "database.php";
$id = $_GET['id'];
$select_status = "SELECT * FROM `users` WHERE `user_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);
// echo $after_assoc_status['banner_status'];

if ($after_assoc_status['status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `users` SET `status`= 0 WHERE `user_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_users.php');
} else {
    // all status set 0
    $update_status = "UPDATE `users` SET `status`= 0";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_users.php');
    // update status 0 to 1
    $update_status = "UPDATE `users` SET `status`= 1 WHERE `user_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_users.php');
}
?>