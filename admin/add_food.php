<?php
require_once("../conn.php");


$f_id = $_POST["f_id"];
$f_name = $_POST["f_name"];
$f_price = $_POST["f_price"];
$f_detail = $_POST["f_detail"];
$f_status = $_POST["f_status"];
$ft_id = $_POST["ft_id"];

$sql = "INSERT INTO `food` (`f_id`, `f_name`, `f_price`, `f_detail`, `f_status`, `ft_id`) VALUES (Null,'$f_name','$f_price','$f_detail','1','$ft_id')";

$r = mysqli_query($conn,$sql);
if ($r){
    echo "เพิ่มข้อมูลเรียบร้อย";
    header('refresh:1; url=admin_index.php');
}else{
    echo "ไม่สามารถเพิ่มข้อมูลได้";
    header('refresh:1; url=add_form_food.php');
}

?>