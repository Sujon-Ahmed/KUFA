<?php
session_start();
require "database.php";
include 'flash_data.php';
$about_id = $_POST['about_id'];
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
                    $file_destination = "assets/uploads/abouts/".$file_new_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        unlink("assets/uploads/abouts/".$old_img);
                        $update_about = "UPDATE `abouts` SET `about_sub_title`='$sub_title',`about_title`='$title',`about_image`='$file_new_name',`about_description`='$description' WHERE `about_id`=$about_id";
                        $update_about_result = mysqli_query($db_connection, $update_about);
                        Flash_data::success("About Update Success");
                        header('location:view_about.php?about_id='.$about_id);
                    }
                } else {
                    Flash_data::error("File Upload Error!");
                    header('location:edit_about.php?about_id='.$about_id);
                }
            } else {
                Flash_data::error("File Size Too Large!");
                header('location:edit_about.php?about_id='.$about_id);
            }
        } else {
            Flash_data::error("Invalid File Extension!");
            header('location:edit_about.php?about_id='.$about_id);
        }
    } else {
        $update_about = "UPDATE `abouts` SET `about_sub_title`='$sub_title',`about_title`='$title',`about_image`='$old_img',`about_description`='$description' WHERE `about_id`=$about_id";
        $update_about_result = mysqli_query($db_connection, $update_about);
        Flash_data::success("About Update Success");
        header('location:view_about.php?about_id='.$about_id);           
    }
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_about.php?about_id='.$about_id);
}




?>