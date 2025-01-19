<?php
session_start();
include('../conn.php');

$_SESSION['table'] = isset($_GET['t_id']) ? $_GET['t_id'] : null;
if ($_SESSION['table']) {
    $t_id = $_SESSION['table'];
    // echo $_SESSION['table'];
} else {
    echo '<script> alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ"); window.location.href="../index.php"; </script>';
}

$orders = "SELECT * FROM `orders` WHERE `t_id` = $t_id  AND `o_status` = '1' OR `o_status` = '2'";
$r = mysqli_query($conn, $orders);
if ($num = mysqli_num_rows($r) > 0) {
    $row = mysqli_fetch_array($r);
    $o_id = $row[0];
}

$receipt = "SELECT * FROM `receipt` WHERE `o_id` = $o_id";
$r2 = mysqli_query($conn, $receipt);
if ($num2 = mysqli_num_rows($r2) > 0) {
    $row2 = mysqli_fetch_array($r2);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รอออเดอร์</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="mobile_styles.css">
    <style>
        .head {

            font-family: 'Noto Sans Thai', sans-serif;
            color: #000000;
        }

        .card-order {

            background-color: #ffffff;
            /* height: 35rem; */
            margin: 30px;
            display: flex;
            justify-content: center;
        }

        .ct {
            display: flex;
            justify-content: center;
        }

        .card-ot {
            display: flex;
            justify-content: center;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 10px;
        }

        .footer {
            position: absolute;
            font-size: 18px;
            bottom: 0;
            left: 0;
            transform: translate(calc(50vw - 50%), -50%);
        }
    </style>
</head>

<body style="background-color: #978B78;">
    <div class="flex card-order">
        <div class="col" style="flex: none">
            <div class="head " style="margin-top: 8px; ">receipt id :
                <?php echo $row2[0] ?>
            </div>
            <div class="head " style="margin-top: 8px; ">receipt date :
                <?php echo $row2[1] ?>
            </div>
            <div class="head " style="margin-top: 8px; ">table :
                <?php echo $row[2] ?>
            </div>
            <div>
                --------------------------------
            </div>
            <div class="head " style="margin-top: 8px; ">order id :
                <?php echo $row[0] ?>
            </div>
            <div style="margin-left: 10px;">
                <?php
                $food = "SELECT * FROM `food` 
                JOIN `order_items` 
                ON `order_items`.`f_id` = `food`.`f_id`
                JOIN `orders`
                ON `orders`.`o_id` = `order_items`.`o_id`
                WHERE `orders`.`o_id` = $o_id " ;
                $r3 = mysqli_query($conn, $food);
                if ($num2 = mysqli_num_rows($r3) > 0) {
                    while ($row2 = mysqli_fetch_array($r3)) {

                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="head " style="margin-top: 6px; ">
                                    <?php echo $row2[10] ?>x
                                    <?php echo $row2[1] ?>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="head text-end" style="margin-top: 4px; ">
                                    <?php echo $row2[2] ?> B
                                </div>
                            </div>

                        </div>
                    <?php }
                } ?>
            </div>
            <div>
                --------------------------------
            </div>
            <?php
            $totalresult = "SELECT oi.o_id, SUM(oi.quantity * f.f_price) AS total_price
                                                FROM order_items oi
                                                JOIN food f ON oi.f_id = f.f_id
                                                JOIN orders o ON o.o_id = oi.o_id
                                                WHERE o.t_id = $t_id AND o.o_id = $o_id
                                                GROUP BY oi.o_id;";
            $total_r = mysqli_query($conn, $totalresult);
            $total_num = mysqli_num_rows($total_r);
            if ($total_num > 0) {
                while ($total_row = mysqli_fetch_row($total_r)) {
                    ?>
                    <div class="head" style="display: flex; justify-content: space-between;">
                        รวม
                        <?php echo '<div class="text-thai-body">' . $total_row[1] . '</div> '; ?>
                        บาท
                    </div>
                <?php }
            } ?>
        </div>

    </div>
    <div class="head card-ot footer">
        สถานะออเดอร์ :
        <?php
        $statuslist = array('1' => "เสร็จแล้ว", '2' => "กำลังทำ");
        echo $statuslist[$row[4]] ?>
    </div>
</body>

</html>