<?php

session_start();
require_once("..\conn.php");

$o_id = $_GET["o_id"];

$sql = "UPDATE `orders` SET 
`o_status` = '1'
WHERE `orders`.`o_id` = '$o_id'";
$r = mysqli_query($conn,$sql);
if ($r){
    header('refresh:1; url=admin_index.php');
}else{
    echo "ไม่สามารถแก้ไขข้อมูลได้";
    header('refresh:1; url=admin_index.php');
}

?>