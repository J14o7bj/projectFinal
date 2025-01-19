<?php
session_start();
require_once("../conn.php");

$a_user = $_POST["a_user"];
$a_pass = $_POST["a_pass"];


$sql = "SELECT * FROM `admin` WHERE `a_user` = '$a_user' AND `a_pass` = '$a_pass'";
$r = mysqli_query($conn,$sql);
$num = mysqli_num_rows($r);
if($num>0){
    $_SESSION['a_user'] = $a_user;
    echo '<script> alert("เข้าสู่ระบบเรียบร้อย"); window.location.href="admin_index.php"; </script>';
    exit(0); 
}else{
    echo '<script> alert("เข้าสู่ระบบไม่สำเร็จ กรุณาตรวจสอบ ชื่อผู้ใช้ หรือ รหัสผ่าน"); window.location.href="login_form_admin.php"; </script>';
    exit(0); 
}

?>