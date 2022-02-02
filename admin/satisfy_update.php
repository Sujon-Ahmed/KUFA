<?php 
session_start();
require "database.php";
include "flash_data.php";
$id = $_POST['id'];
$icon = $_POST['icon'];
$value = $_POST['value'];
$name = $_POST['name'];
if ($icon != '' && $value != '' && $name != '') {
    $update_satisfy = "UPDATE `satisfies` SET `icon`='$icon',`value`='$value',`name`='$name' WHERE `id` = $id";
    $result = mysqli_query($db_connection, $update_satisfy);
    Flash_data::success("Satisfies Update Success");
    header('location:view_satisfy.php?id='.$id);
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_satisfy.php?id='.$id);
}
?>