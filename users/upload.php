<?php
session_start();
require_once("../conn.php");

$_SESSION['table'] = isset($_GET['t_id']) ? $_GET['t_id'] : null;
if ($_SESSION['table']) {
    $t_id = $_SESSION['table'];
    // echo $_SESSION['table'];
} else {
    echo '<script> alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ"); window.location.href="../index.php"; </script>';
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pic = $_FILES['file'];

    // Check if a file was uploaded
    if ($pic['error'] == UPLOAD_ERR_OK) {
        $name_file = $pic['name'];
        $tmp_name = $pic['tmp_name'];
        $locate_img = "../img/slip/";

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($tmp_name, $locate_img . $name_file)) {
            // Insert the file information into the database
            $sql = "UPDATE `orders` SET `pic_payment` = '$name_file' WHERE `t_id` = '$t_id'";
            $r = mysqli_query($conn, $sql);

            if ($r) {
                echo "เพิ่มข้อมูลเรียบร้อย";
                $update_o_status = "UPDATE `orders` SET `o_status` = '2' WHERE `t_id` = '$t_id'";
                $r1 = mysqli_query($conn, $update_o_status);
                if($r1){
                    header('refresh:0; url=create_receipt.php?t_id=' . $t_id);
                }else{
                    echo "ไม่สามารถเปลี่ยนสถานะออเดอร์ได้";
                    header('refresh:1; url=payment_page.php?t_id=' . $t_id);
                }
                
            } else {
                echo "ไม่สามารถเพิ่มข้อมูลได้";
                header('refresh:1; url=payment_page.php?t_id=' . $t_id);

            }
        } else {
            echo "Error uploading the file";
        }
    } else {
        echo "Error: " . $pic['error'];
    }
}
?>