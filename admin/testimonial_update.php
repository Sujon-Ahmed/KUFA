<?php
session_start();
require "database.php";
include 'flash_data.php';
$id = $_POST['id'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$description = $_POST['description'];
$old_image = $_POST['old_image'];
if ($name != '' && $designation != '' && $description != '') {
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
                    $file_destination = "assets/uploads/testimonials/".$file_new_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        unlink("assets/uploads/testimonials/".$old_image);
                        $update_testimonial = "UPDATE `testimonials` SET `name`='$name',`designation`='$designation',`image`='$file_new_name',`quotes`='$description' WHERE `id`=$id";
                        $update_result = mysqli_query($db_connection, $update_testimonial);
                        Flash_data::success("Testimonial Update Success");
                        header('location:view_testimonial.php?id='.$id);
                    }
                } else {
                    Flash_data::error("File Upload Error!");
                    header('location:edit_testimonial.php?id='.$id);
                }
            } else {
                Flash_data::error("File Size Too Large!");
                header('location:edit_testimonial.php?id='.$id);
            }
        } else {
            Flash_data::error("Invalid File Extension!");
            header('location:edit_testimonial.php?id='.$id);
        }
    } else {
        $update_testimonial = "UPDATE `testimonials` SET `name`='$name',`designation`='$designation',`image`='$old_image',`quotes`='$description' WHERE `id`=$id";
        $update_result = mysqli_query($db_connection, $update_testimonial);
        Flash_data::success("Testimonial Update Success");
        header('location:view_testimonial.php?id='.$id);         
    }
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_testimonial.php?id='.$id);
}




?>