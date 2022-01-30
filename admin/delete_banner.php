<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['banner_id'])) {
    $banner_id = $_GET['banner_id'];
    $select_banners = "SELECT * FROM `banners` WHERE `banner_id` = $banner_id";
    $select_banners_result = mysqli_query($db_connection, $select_banners);
    $after_assoc = mysqli_fetch_assoc($select_banners_result);
    $delete_form = "assets/uploads/banners/".$after_assoc['banner_img'];
    unlink($delete_form);
    $delete_banner = "DELETE FROM `banners` WHERE `banner_id`= $banner_id";
    $delete_result = mysqli_query($db_connection, $delete_banner);
    Flash_data::success("Banner Delete Success");
    header('location:view_banner.php');
}
?>