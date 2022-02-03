<?php
session_start();
require "database.php";
include "flash_data.php";
$id = $_GET['id'];
$select_brands = "SELECT * FROM brands WHERE id = $id";
$select_result = mysqli_query($db_connection, $select_brands);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_form = "assets/uploads/brands/".$after_assoc['image'];
unlink($delete_form);
$delete_brands = "DELETE FROM brands WHERE id = $id";
$result = mysqli_query($db_connection, $delete_brands);
Flash_data::success("Brand Delete Success");
header('location:view_brands.php');
?>