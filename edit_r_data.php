<?php
session_start();
require_once("..\conn.php");

$ft_id = $_GET['ft_id'];
// echo "$user";


$sql = "SELECT * FROM `food_type` WHERE `ft_id`='$ft_id'";
$r = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($r)) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="..\asset\css\bootstrap.min.css">
        <style>
            body {
                background-image: url('');
            }

            footer {
                position: absolute;
                font-size: 12px;
                bottom: 0;
                left: 0;
                transform: translate(calc(50vw - 50%), -50%);
                color: Black;
            }
        </style>
    </head>

    <body>

        <form action="edit_r_data_db.php" method="get" class="" style="padding: 50px;">
            <div class="container mt-5">
                <div class="row-auto">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="header mb-4">
                                    <h3>แก้ไขข้อมูลร้านอาหาร</h3>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="ft_id" class="form-control" value="<?php echo $row[0]; ?>">
                                    <label for="name" class="mb-2">ชื่อ</label>
                                    <input type="text" name="ft_name" class="form-control" value="<?php echo $row[1]; ?>">
                                </div>
                                <div class="d-flex justify-content-between">
                                        <button class="btn btn-success mt-2" type="submit">ตกลง</button>
                                        <a href="res_data.php" class="btn btn-danger mt-2">ยกเลิก</a>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <footer>
        </footer>
    <?php } ?>
</body>
<script src="../asset/css/bootstrap.min.js"></script>

</html>