<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['about_id'])) {
    $about_id = $_GET['about_id'];
    $select_abouts = "SELECT * FROM `abouts` WHERE `about_id` = $about_id";
    $select_abouts_result = mysqli_query($db_connection, $select_abouts);
    $after_assoc = mysqli_fetch_assoc($select_abouts_result);
    $delete_form = "assets/uploads/abouts/".$after_assoc['about_image'];
    unlink($delete_form);
    $delete_about = "DELETE FROM `abouts` WHERE `about_id`= $about_id";
    $delete_result = mysqli_query($db_connection, $delete_about);
    Flash_data::success("About Delete Success");
    header('location:view_about.php');
}
?>