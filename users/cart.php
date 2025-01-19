<?php
session_start();
include('../conn.php');
if ($_SESSION['table'] != NULL) {
    $t_id = $_SESSION['table'];
} else {
    echo '<script> alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ"); window.location.href="../index.php"; </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้า</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="mobile_styles.css">
    <style>
        .card {
            background-color: #978B78;
            border-radius: 10px;
            display: flex;
            align-items: center;
            height: 600px;
        }

        .card-body {
            height: 45rem;
            background-color: #FFFFFF;
            margin: 1rem;
            border-radius: 10px;
            width: -webkit-fill-available;
            overflow-y: auto;
        }

        .mini-btn {
            width: 90px;
            background-color: white;
            padding: 2px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 0px;
        }
    </style>
</head>

<body>
    <?php include('users_bar.php'); ?>

    <div class="container-fluid">
        <div style="font-size: 20px; 
                    color: #5B4E44; 
                    font-family: 'Noto Sans Thai', sans-serif;
                    display: flex;
                    justify-content: center;">ตะกร้า</div>

        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <?php
                        $cartsql = "SELECT `tables`.`t_id`,`food`.`f_id`,`food`.`f_name`,`food`.`f_price`,`order_items`.`quantity`,`order_items`.`item_id`
                        FROM `order_items` 
                        JOIN `food` ON `food`.`f_id` = `order_items`.`f_id`
                        JOIN `orders` ON `orders`.`o_id` = `order_items`.`o_id`
                        JOIN `tables` ON `tables`.`t_id` = `orders`.`t_id`
                        WHERE `tables`.`t_id` = $t_id AND `food`.`f_id` = `order_items`.`f_id` AND `orders`.`o_status` = '4'";
                        $cartresult = mysqli_query($conn, $cartsql);
                        $numc = mysqli_num_rows($cartresult);
                        if ($numc > 0) {
                            while ($rowc = mysqli_fetch_array($cartresult)) {
                                ?>
                                
                                <div class="row" onclick="location.href='edit_form_cart.php?item_id=<?php echo $rowc[5] ?>'">
                                    <div class="col-7" >
                                        <div class="text-name-item">
                                            <?php echo $rowc[4] ?>x
                                            <?php echo $rowc[2] ?>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="text-name-item" style="text-align: end;">
                                            <?php echo $rowc[3] ?> B
                                        </div>
                                    </div>
                                </div>


                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" style="align-items: center;">
            <div class="col-2">
                <div class="text-thai-body">ราคา</div>
            </div>

            <div class="col-3">
                <?php
                $totalresult = "SELECT oi.o_id, SUM(oi.quantity * f.f_price) AS total_price
                                                FROM order_items oi
                                                JOIN food f ON oi.f_id = f.f_id
                                                JOIN orders o ON o.o_id = oi.o_id
                                                WHERE o.t_id = $t_id AND o.o_status = '4'
                                                GROUP BY oi.o_id;";
                $total_r = mysqli_query($conn, $totalresult);
                $total_num = mysqli_num_rows($total_r);
                if ($total_num > 0) {
                    while ($total_row = mysqli_fetch_row($total_r)) {
                        ?>
                        <div class="text-price">
                            <?php echo '<div class="text-thai-body">' . $total_row[1] . '</div> '; ?>
                        </div>
                    <?php }
                } ?>
            </div>

            <div class="col-2">
                <div class="text-thai-body">B</div>
            </div>
            <?php if ($total_num > 0) { ?>
                <div class="col text-end">
                    <button class="button-green" onclick="location.href='payment_page.php?t_id=<?php echo $t_id ?>'"><img
                            width="30" height="30"
                            src="../img/icon/check-mark.png">
                    </button>
                </div>
            <?php } else { ?>
                <div class="col text-end">
                    <button class="button-green"><img width="30" height="30"
                            src="../img/icon/check-mark.png">
                    </button>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>