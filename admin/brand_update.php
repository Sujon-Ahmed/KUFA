<?php
session_start();
require "database.php";
include 'flash_data.php';
$id = $_POST['id'];
$old_img = $_POST['old_img'];
if (!empty($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_extension = explode('.',$file_name);
    $file_actual_extension = strtolower(end($file_extension));
    $allowed_extension = array('jpg','png', 'jpeg');
    if (in_array($file_actual_extension, $allowed_extension)) {
        if ($file_size < 1000000) {
            $file_error = $_FILES['file']['error'];
            if ($file_error == 0) {
                $file_new_name = uniqid('',true).'.'.$file_actual_extension;
                $file_destination = "assets/uploads/brands/".$file_new_name;
                move_uploaded_file($file_tmp, $file_destination);
                unlink('assets/uploads/brands/'.$old_img);
                $update_brands = "UPDATE `brands` SET `image`='$file_new_name' WHERE `id`=$id";
                $result = mysqli_query($db_connection, $update_brands);
                Flash_data::success("Brands Update Success");
                header('location:view_brands.php?id='.$id);
            } else {
                Flash_data::error("File Error!");
                header('location:edit_brand.php?id='.$id);
            }
        } else {
            Flash_data::error("File Size Too Large!");
            header('location:edit_brand.php?id='.$id);
        }
    } else {
        Flash_data::error("File Extension Error!");
        header('location:edit_brand.php?id='.$id);
    }
} else {
    $update_brands = "UPDATE `brands` SET `image`='$old_img' WHERE `id`=$id";
    $result = mysqli_query($db_connection, $update_brands);
    Flash_data::success("Brands Update Success");
    header('location:view_brands.php?id='.$id);
}

?>