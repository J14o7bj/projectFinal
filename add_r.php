<?php
require_once("conn.php");


$ft_id = $_POST["ft_id"];
$ft_name = $_POST["ft_name"];

$sql = "INSERT INTO `food_type` (`ft_id`, `ft_name`) 
VALUES (NULL,'$ft_name')";
$r = mysqli_query($conn,$sql);
if ($r){
    echo "เพิ่มข้อมูลเรียบร้อย";
    header('refresh:1; url=res_data.php');
}else{
    echo "ไม่สามารถเพิ่มข้อมูลได้";
    header('refresh:1; url=add_r_form.php');
}

?>