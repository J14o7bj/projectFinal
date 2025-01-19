<?php

session_start();
require_once("..\conn.php");

$o_id = $_GET["o_id"];
$o_status = '3';
$sql = "UPDATE `orders` SET 
`o_status` = '$o_status'
WHERE `orders`.`o_id` = '$o_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    echo '<script> alert("ลบข้อมูลเรียบร้อย"); window.location.href="admin_index.php"; </script>';
}else{
    echo '<script> alert("ลบข้อมูลไม่สำเร็จ"); window.location.href="admin_index.php"; </script>';
}

?>