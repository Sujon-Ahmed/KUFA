<?php
session_start();
require 'database.php';
include 'flash_data.php';
$icon = $_POST['icon'];
$value = $_POST['value'];
$name = $_POST['name'];
if ($icon != '' && $value != '' && $name != ''){
    $insert_satisfy = "INSERT INTO `satisfies`(`icon`, `value`, `name`) VALUES ('$icon','$value','$name')";
    $result = mysqli_query($db_connection, $insert_satisfy);
    Flash_data::success("Satisfy Add Successfully");
    header('location:add_satisfy.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_satisfy.php');
}
?>