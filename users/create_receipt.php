<?php
session_start();
include('../conn.php');

$_SESSION['table'] = isset($_GET['t_id']) ? $_GET['t_id'] : null;
if ($_SESSION['table']) {
    $t_id = $_SESSION['table'];
} else {
    echo '<script> alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ"); window.location.href="../index.php"; </script>';
}
$sql = "SELECT * FROM `orders` WHERE `t_id` = $t_id AND `o_status` = '2'";
$r = mysqli_query($conn, $sql);
if ($r) {
    $row = mysqli_fetch_array($r);
    $o_id = $row[0];
    $insert = "INSERT INTO `receipt` (`re_id`, `re_date`, `o_id`) 
            VALUES (NULL, CURRENT_TIMESTAMP, '$o_id')";
    $re = mysqli_query($conn, $insert);
    if ($re) {
        header('refresh:0; url=order_status.php?t_id=' . $t_id);
    } else {
        echo '<script> alert("เกิดข้อผิดพลาดในการออกใบเสร็จ กรุณาแจ้งผู้ดูแลระบบ"); window.location.href="../index.php"; </script>';
    }
} else {
    echo '<script> alert("เกิดข้อผิดพลาดกับสถานะออเดอร์ กรุณาแจ้งผู้ดูแลระบบ"); window.location.href="../index.php"; </script>';
}



?>