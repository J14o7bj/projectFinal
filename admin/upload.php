<?php
require_once("../conn.php");

$f_id = $_GET['f_id'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pic = $_FILES['file'];

    // Check if a file was uploaded
    if ($pic['error'] == UPLOAD_ERR_OK) {
        $name_file = $pic['name'];
        $tmp_name = $pic['tmp_name'];
        $locate_img = "../img/";

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($tmp_name, $locate_img . $name_file)) {
            // Insert the file information into the database
            $sql = "UPDATE `food` SET `pic` = '$name_file' WHERE `f_id` = '$f_id'";
            $r = mysqli_query($conn, $sql);

            if ($r) {
                echo "เพิ่มข้อมูลเรียบร้อย";
                header('refresh:1; url=admin_index.php');
            } else {
                echo "ไม่สามารถเพิ่มข้อมูลได้";
                header('refresh:1; url=admin_index.php');
            }
        } else {
            echo "Error uploading the file";
        }
    } else {
        echo "Error: " . $pic['error'];
    }
}
?>
