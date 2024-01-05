<?php

session_start();
require_once("..\conn.php");

$ft_id = $_GET["ft_id"];
$ft_name = $_GET["ft_name"];

$sql = "UPDATE `food_type` SET 
`ft_name` = '$ft_name'
WHERE `food_type`.`ft_id` = '$ft_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    echo "แก้ไขข้อมูลเรียบร้อย";
    header('refresh:1; url=res_data.php');
}else{
    echo "ไม่สามารถแก้ไขข้อมูลได้";
    header('refresh:1; url=edit_r_data.php');
}

?>