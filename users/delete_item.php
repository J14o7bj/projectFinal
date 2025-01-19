<?php

session_start();
require_once("..\conn.php");

$item_id = $_GET["item_id"];
$sql = "DELETE FROM `order_items` WHERE `order_items`.`item_id` = $item_id";
$r = mysqli_query($conn,$sql);
if ($r){
    echo '<script> alert("เรียบร้อย"); window.location.href="cart.php"; </script>';
}else{
    echo '<script> alert("เกิดข้อผิดพลาด"); window.location.href="cart.php"; </script>';
}

?>