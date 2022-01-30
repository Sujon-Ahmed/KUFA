<?php
session_start();
require "database.php";
include 'flash_data.php';
$banner_id = $_POST['banner_id'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$description = $_POST['description'];
$old_img = $_POST['old_img'];
if ($sub_title != '' && $title != '' && $description != '') {
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_extension = explode('.',$file_name);
        $file_actual_extension = strtolower(end($file_extension));
        $allowed_extension = array('jpg', 'jpeg', 'png');
        if (in_array($file_actual_extension, $allowed_extension)) {
            if ($file_size < 1000000) {
                $file_error = $_FILES['file']['error'];
                if ($file_error == 0) {
                    $file_new_name = uniqid('',true).'.'.$file_actual_extension;
                    $file_destination = "assets/uploads/banners/".$file_new_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        unlink("assets/uploads/banners/".$old_img);
                        $update_banner = "UPDATE `banners` SET `banner_sub_title`='$sub_title',`banner_title`='$title',`description`='$description',`banner_img`='$file_new_name' WHERE `banner_id` = $banner_id";
                        $update_banner_result = mysqli_query($db_connection, $update_banner);
                        Flash_data::success("Banner Update Success");
                        header('location:view_banner.php?banner_id='.$banner_id);
                    }
                } else {
                    Flash_data::error("File Upload Error!");
                    header('location:edit_banner.php?banner_id='.$banner_id);
                }
            } else {
                Flash_data::error("File Size Too Large!");
                header('location:edit_banner.php?banner_id='.$banner_id);
            }
        } else {
            Flash_data::error("Invalid File Extension!");
            header('location:edit_banner.php?banner_id='.$banner_id);
        }
    } else {
        $update_banner = "UPDATE `banners` SET `banner_sub_title`='$sub_title',`banner_title`='$title',`description`='$description',`banner_img`='$old_img' WHERE `banner_id` = $banner_id";
        $update_banner_result = mysqli_query($db_connection, $update_banner);
        Flash_data::success("Banner Update Success");
        header('location:view_banner.php?banner_id='.$banner_id);           
    }
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_banner.php?banner_id='.$banner_id);
}




?>