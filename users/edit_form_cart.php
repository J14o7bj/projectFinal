<?php
session_start();
require_once("..\conn.php");

$item_id = $_GET['item_id'];


$items = "SELECT * FROM `order_items` WHERE `item_id`='$item_id'";
$re = mysqli_query($conn, $items);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการอาหาร</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" href="mobile_styles.css">
    <style>
        .btn-head {
            width: 35px;
            height: 30px;
            border: 0px;
            background-color: #ffffff;
            border-radius: 30px;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }
    </style>
</head>

<body style="background-color: #978B78;">


    <form action="edit_cart.php?item_id=<?php echo $item_id; ?>" method="get" class="" style="padding: 50px;"
        enctype="multipart/form-data">
        <div class="container mt-5">
            <div class="row-auto">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="header mb-4">
                                <div class="text-thai-body" style="font-size: 20px;">แก้ไขรายการอาหาร</div>
                            </div>
                            <div class="form-group">
                                <?php while ($row = mysqli_fetch_row($re)) {
                                    $f_id = $row[2];
                                    $food = "SELECT * FROM `food` WHERE `f_id`='$f_id'";
                                    $result = mysqli_query($conn, $food);
                                    if ($result) {
                                        while ($frow = mysqli_fetch_row($result)) {


                                            ?>
                                            <div style="background-color: #978B78; border: 0px;
                                                        border-radius: 10px;
                                                        margin-bottom: 10px;
                                                        padding: 10px;">

                                                <input type="hidden" name="item_id" class="form-control"
                                                    value="<?php echo $row[0]; ?>">
                                                <label for="name" class="mb-2" style="color: #FFFFFF; font-size: 18px;">
                                                    <?php echo $frow[1]; ?>
                                                </label>
                                                <div class="row">
                                                    <div class="col-3" style="display: flex; align-items: center;">
                                                        <label for="name" class="mb-2 text-thai-body">จำนวน</label>
                                                    </div>
                                                    <div class="qty-input">
                                                        <div class="row" style="display: flex; justify-content: center;">
                                                            <button class="qty" data-action="minus" type="button"
                                                                onclick="updateQuantity(-1)">-</button>
                                                            <input class="qty" style="width: 50px; height: 20px;" type="number"
                                                                name="quantity" id="quantity" min="0" max="10" value="1"
                                                                oninput="updateQuantity()">
                                                            <button class="qty" data-action="add" type="button"
                                                                onclick="updateQuantity(1)">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-3" style="display: flex; align-items: center;"
                                                        onclick="location.href='delete_item.php?item_id=<?php echo $item_id ?>'">
                                                        <label for="name" class="mb-2 text-thai-body mini-btn"
                                                            style="background-color: #DC7862; color: #ffffff;">ลบ</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <button class="mini-btn text-thai-body" type="submit"
                                                style="background-color: #92BD70; color: #FFFFFF; border: 0px; margin: 5px;">
                                                ยืนยัน
                                            </button>
                                            <?php }
                                    }
                                } ?>
                                </div>
                                    



                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>


    <script>
        function updateQuantity(value) {
            var quantityInput = document.getElementById("quantity");
            var currentQuantity = parseInt(quantityInput.value, 10);

            if (!isNaN(currentQuantity)) {
                var newQuantity = currentQuantity + (value || 0);

                // Ensure the new quantity is within the allowed range
                if (newQuantity >= 0 && newQuantity <= 10) {
                    quantityInput.value = newQuantity;
                }
            }
        }
    </script>

</body>
<?php include('../script.php'); ?>


</html>