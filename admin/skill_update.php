<?php 
session_start();
require "database.php";
include "flash_data.php";
$skill_id = $_POST['skill_id'];
$skill_name = $_POST['skill_name'];
$skill_value = $_POST['skill_value'];
if ($skill_name != '' && $skill_value != '') {
    $update_skill = "UPDATE `skills` SET `skill_name`='$skill_name',`skill_percentage`='$skill_value' WHERE `skill_id` = $skill_id";
    $result = mysqli_query($db_connection, $update_skill);
    Flash_data::success("Skill Update Success");
    header('location:view_skill.php?skill_id='.$skill_id);
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_skill.php?skill_id='.$skill_id);
}
?>