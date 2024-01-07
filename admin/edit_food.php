<?php

session_start();
require_once("..\conn.php");

$f_id = $_GET["f_id"];
$f_name = $_GET["f_name"];
$f_price = $_GET["f_price"];
$f_detail = $_GET["f_detail"];
$ft_id = $_GET["ft_id"];

$sql = "UPDATE `food` SET 
`f_name` = '$f_name',
`f_price` = '$f_price',
`f_detail` = '$f_detail',
`ft_id` = '$ft_id'
WHERE `food`.`f_id` = '$f_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    echo "แก้ไขข้อมูลเรียบร้อย";
    header('refresh:1; url=admin_index.php');
}else{
    echo "ไม่สามารถแก้ไขข้อมูลได้";
    header('refresh:1; url=edit_form_food.php');
}

?>