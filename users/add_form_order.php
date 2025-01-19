<?php
session_start();
require_once("../conn.php");
$f_id = $_GET['f_id'];
$sql = "SELECT * FROM `food` WHERE f_id = $f_id";
$r = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($r);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../link.php'); ?>
    <link rel="stylesheet" href="mobile_styles.css">
    <title>เพิ่มอาหาร</title>
</head>

<body>
    <?php include_once('users_bar.php') ?>
    <form action="add_cart.php" method="get" class="" style="padding: 10px;" enctype="multipart/form-data">
        <div class="container mt-5">
            <div class="row-auto">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="header mb-4">
                                <h3>
                                    <?php echo $row[1] ?>
                                </h3>
                                <label for="detail" class="">
                                    <?php echo $row[3] ?>
                                </label>
                            </div>
                            <div class="form-group">

                                <input type="hidden" name="item_id" class="form-control">
                                <input type="hidden" name="o_id" class="form-control">
                                <input type="hidden" name="f_id" class="form-control" value="<?php echo $row[0] ?>">
                                <label for="quantity" class="">จำนวน</label>

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

                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success mt-2" type="submit">สั่งซื้อ</button>
                                <a href="users_index.php?t_id=<?php echo $_SESSION['table']; ?>"
                                    class="btn btn-danger mt-2">ยกเลิก</a>

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