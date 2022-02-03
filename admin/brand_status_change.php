<?php
require "database.php";
$id = $_GET['id'];
$select_brands = "SELECT * FROM brands WHERE id=$id";
$result = mysqli_query($db_connection, $select_brands);
$after_assoc = mysqli_fetch_assoc($result);

if ($after_assoc['status'] == 1) {
    $update_status = "UPDATE brands SET status = 0 WHERE id=$id";
    $query = mysqli_query($db_connection, $update_status);
    header('location:view_brands.php');
} else {
    $update_status = "UPDATE brands SET status = 1 WHERE id=$id";
    $query = mysqli_query($db_connection, $update_status);
    header('location:view_brands.php');
}

?>