<?php
session_start();
require 'database.php';
include 'flash_data.php';
$name = $_POST['name'];
$designation = $_POST['designation'];
$description = $_POST['description'];
if ($name != '' && $designation != '' && $description != ''){
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
                        $insert_testimonial = "INSERT INTO `testimonials`(`name`, `designation`, `image`, `quotes`) VALUES ('$name','$designation','$file_new_name','$description')";
                        $insert_testimonial_result = mysqli_query($db_connection, $insert_testimonial);
                        Flash_data::success("Testimonial Insert Success");
                        header('location:add_testimonial.php');
                    } else {
                        Flash_data::error("Something Went Wrong!");
                        header('location:add_testimonial.php');
                    }
                } else {
                    Flash_data::error("File Error!");
                    header('location:add_testimonial.php');
                }
            } else {
                Flash_data::error("This File Size Too Large!");
                header('location:add_testimonial.php');
            }
        } else {
            Flash_data::error("Invalid File Extension!");
            header('location:add_testimonial.php');
        }
    } else {
        Flash_data::error("Select an Image!");
        header('location:add_testimonial.php');
    }
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_testimonial.php');
}
?>