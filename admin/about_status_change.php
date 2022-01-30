<?php
require "database.php";
$id = $_GET['id'];
$select_status = "SELECT * FROM `abouts` WHERE `about_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);

if ($after_assoc_status['about_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `abouts` SET `about_status`= 0 WHERE `about_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_about.php');
} else {
    // all status set 0
    $update_status = "UPDATE `abouts` SET `about_status`= 0";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_about.php');
    // update status 0 to 1
    $update_status = "UPDATE `abouts` SET `about_status`= 1 WHERE `about_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_about.php');
}
?>