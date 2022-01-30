<?php
session_start();
require 'database.php';
include 'flash_data.php';
$skill_name = $_POST['skill_name'];
$skill_value = $_POST['skill_value'];
if ($skill_name != '' && $skill_value != ''){
    $insert_skill = "INSERT INTO `skills`(`skill_name`, `skill_percentage`) VALUES ('$skill_name','$skill_value')";
    $insert_skill_result = mysqli_query($db_connection, $insert_skill);
    Flash_data::success("Skill Add Successfully");
    header('location:add_skill.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_skill.php');
}
?>