<?php

session_start();
require_once("..\conn.php");

$ft_id = $_GET["ft_id"];
$ft_status = 'N';
$sql = "UPDATE `food_type` SET 
`ft_status` = '$ft_status'
WHERE `food_type`.`ft_id` = '$ft_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    echo "ลบข้อมูลเรียบร้อย";
    header('refresh:1; url=type_data.php');
}else{
    echo "ไม่สามารถลบข้อมูลได้";
    header('refresh:1; url=type_data.php');
}

?>