<?php
session_start();
require_once("../conn.php");
$t_id = $_SESSION['table'];

$item_id = $_GET['item_id'];
$o_id = $_GET['o_id'];
$f_id = $_GET['f_id'];
$quantity = $_GET['quantity'];


$checkoder = "SELECT * FROM `orders` WHERE `orders`.`t_id` = $t_id AND `o_status` = '4'";
$r_check = mysqli_query($conn, $checkoder);



$checkoder2 = "SELECT * FROM `orders` WHERE `orders`.`t_id` = $t_id";
$r_check2 = mysqli_query($conn, $checkoder2);



$createorder = "INSERT INTO `orders` (`o_id`,`o_date`,`t_id`,`pic_payment`,`o_status`)
                VALUES (NULL, CURRENT_TIMESTAMP, '$t_id', NULL, '4')";





if ($num = mysqli_num_rows($r_check) > 0) {
    $row1 = mysqli_fetch_array($r_check);
    $o_id = $row1[0];
    $insert = "INSERT INTO order_items (`item_id`,`o_id`,`f_id`,`quantity`) 
                        VALUES (NULL,'$o_id','$f_id','$quantity')";
    $r = mysqli_query($conn, $insert);
    if ($r) {
        echo '<script> alert("เพิ่มรายการสำเร็จ สามารถเช็คสินค้าได้ในตะกร้า"); </script>';
        header('refresh:0; url=users_index.php?t_id=' . $_SESSION['table'] . '');
    } else {
        echo '<script> alert("เพิ่มรายการไม่สำเร็จ"); </script>';
        header('refresh:0; url=users_index.php?t_id=' . $_SESSION['table'] . '');
    }


} elseif ($numm = mysqli_num_rows($r_check2) > 0) {

    if ($num3 = mysqli_num_rows($r_check3) > 0) {
        $order_r = mysqli_query($conn, $createorder);
        if ($order_r) {
            // echo '<script> alert("สร้างออเดอร์เสร็จสิ้น"); </script>';
            header('refresh:1; url=add_cart.php?item_id=' . $item_id . '&o_id=' . $o_id . '&f_id=' . $f_id . '&quantity=' . $quantity);

        } else {
            echo '<script> alert("สร้างออเดอร์ไม่สำเร็จ"); </script>';
            header('refresh:1; url=users_index.php?t_id=' . $_SESSION['table'] . '');
        }
    } else {
        echo '<script> alert("ประมวลผลไม่สำเร็จ"); </script>';
        header('refresh:1; url=../index.php');
    }

} else {
    $order_r = mysqli_query($conn, $createorder);
    if ($order_r) {
        // echo '<script> alert("สร้างออเดอร์เสร็จสิ้น"); </script>';
        header('refresh:1; url=add_cart.php?item_id=' . $item_id . '&o_id=' . $o_id . '&f_id=' . $f_id . '&quantity=' . $quantity);

    } else {
        echo '<script> alert("สร้างออเดอร์ไม่สำเร็จ"); </script>';
        header('refresh:1; url=users_index.php?t_id=' . $_SESSION['table'] . '');
    }
}


?>