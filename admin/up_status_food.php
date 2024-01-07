<?php

session_start();
require_once("..\conn.php");

$f_id = $_GET["f_id"];
$f_status = $_GET["f_status"];

$sql = "UPDATE `food` SET 
`f_status` = '$f_status'
WHERE `food`.`f_id` = '$f_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    echo "แก้ไขข้อมูลเรียบร้อย";
    header('refresh:1; url=admin_index.php');
}else{
    echo "ไม่สามารถแก้ไขข้อมูลได้";
    header('refresh:1; url=update_status_food.php');
}

?>