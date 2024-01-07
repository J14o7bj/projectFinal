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

        <form action="edit_food.php" method="get" class="" style="padding: 50px;">
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
                                    <label for="name" class="">ชื่อ</label>
                                    <input type="text" name="f_name" class="form-control" value="<?php echo $row[1]; ?>">
                                    <label for="price" class="">ราคา</label>
                                    <input type="text" name="f_price" class="form-control" value="<?php echo $row[2]; ?>">
                                    <label for="detail" class="">รายละเอียด</label>
                                    <input type="text" name="f_detail" class="form-control" value="<?php echo $row[3]; ?>">
                                    <!-- <label for="hidden" class="">สถานะ</label> -->
                                    <input type="hidden" name="f_status" class="form-control"
                                        value="<?php echo $row[4]; ?>">

                                    <label for="foodtype" class="">ประเภทอาหาร</label>
                                    <select class="form-control" name="ft_id" id="ft_id" required="required">
                                        <option selected>
                                            <?php
                                            $ft_id = $row[5];
                                            $sql1 = "SELECT *
                                            FROM `food_type`
                                            INNER JOIN `food` ON `food_type`.`ft_id` = $ft_id
                                            WHERE `ft_status` = 'Y' AND `f_id` = $f_id;
                                            ";
                                            $r1 = mysqli_query($conn, $sql1);
                                            $num = mysqli_num_rows($r1);
                                            if($num > 0){
                                                while ($roww = mysqli_fetch_row($r1)) {
                                                    echo $roww[1];
                                                }
                                            }
                                            ?>
                                        </option>
                                        <?php
                                            $sql2 = "SELECT *
                                            FROM `food_type`
                                            WHERE `ft_status` = 'Y';
                                            ";
                                            $r2 = mysqli_query($conn, $sql2);
                                            $num2 = mysqli_num_rows($r2);
                                            if($num2 > 0){
                                                while ($row2 = mysqli_fetch_row($r2)) {
                                                    
                                            ?>
                                        <option value="<?php echo $row2[0]; ?>"><?php echo $row2[1]; ?></option>
                                        <?php }} ?>
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