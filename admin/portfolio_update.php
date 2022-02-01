<?php
session_start();
require "database.php";
include 'flash_data.php';
$portfolio_id = $_POST['portfolio_id'];
$category = $_POST['portfolio_category'];
$title = $_POST['portfolio_title'];
$description = $_POST['description'];
$old_image = $_POST['old_image'];
if ($category != '' && $title != '' && $description != '') {
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
                    $file_destination = "assets/uploads/portfolios/".$file_new_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        unlink("assets/uploads/portfolios/".$old_image);
                        $update_portfolio = "UPDATE `portfolios` SET `portfolio_category`='$category',`portfolio_title`='$title',`portfolio_description`='$description',`portfolio_image`='$file_new_name' WHERE `portfolio_id` = $portfolio_id";
                        $update_portfolio_result = mysqli_query($db_connection, $update_portfolio);
                        Flash_data::success("Portfolio Update Success");
                        header('location:view_portfolio.php?portfolio_id='.$portfolio_id);
                    }
                } else {
                    Flash_data::error("File Upload Error!");
                    header('location:edit_portfolio.php?portfolio_id='.$portfolio_id);
                }
            } else {
                Flash_data::error("File Size Too Large!");
                header('location:edit_portfolio.php?portfolio_id='.$portfolio_id);
            }
        } else {
            Flash_data::error("Invalid File Extension!");
            header('location:edit_portfolio.php?portfolio_id='.$portfolio_id);
        }
    } else {
        $update_portfolio = "UPDATE `portfolios` SET `portfolio_category`='$category',`portfolio_title`='$title',`portfolio_description`='$description',`portfolio_image`='$old_image' WHERE `portfolio_id` = $portfolio_id";
        $update_portfolio_result = mysqli_query($db_connection, $update_portfolio);
        Flash_data::success("Portfolio Update Success");
        header('location:view_portfolio.php?banner_id='.$portfolio_id);           
    }
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_portfolio.php?portfolio_id='.$portfolio_id);
}




?>