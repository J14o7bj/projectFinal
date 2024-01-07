<?php
session_start();
require_once("..\conn.php");

$f_id = $_GET['f_id'];
// echo "$user";


$sql = "SELECT * FROM `food` WHERE `f_id`='$f_id'";
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
        <?php include('../link.php'); ?>
        <link rel="stylesheet" href="../styles.css">
    </head>

    <body>

        <form action="up_status_food.php" method="get" class="" style="padding: 50px;">
            <div class="container mt-5">
                <div class="row-auto">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="header mb-4">
                                    <h3>แก้ไขข้อมูลร้านอาหาร</h3>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="f_id" class="form-control" value="<?php echo $row[0]; ?>">
                                    <label for="hidden" class="">สถานะ</label>

                                    <select class="form-control" name="f_status" id="f_status" required="required">
                                            <?php
                                            $statuslist = array('1' => "คงเหลือ", '2' => "สินค้าหมด");
                                            $f_status = $row[4];
                                            $sql1 = "SELECT *
                                            FROM `food`
                                            WHERE `f_status` = $f_status AND `f_id` = $f_id;
                                            ";
                                            $r1 = mysqli_query($conn, $sql1);
                                            $num = mysqli_num_rows($r1);
                                            if ($num > 0) {
                                                while ($roww = mysqli_fetch_row($r1)) {
                                                    echo '<option selected>' . $statuslist[$f_status] . '</option>';
                                                }

                                            }
                                            ?>
                                        <?php

                                        foreach ($statuslist as $value => $label) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>


                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success mt-2" type="submit">ตกลง</button>
                                    <a href="admin_index.php" class="btn btn-danger mt-2">ยกเลิก</a>

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
<?php include('../script.php'); ?>


</html>