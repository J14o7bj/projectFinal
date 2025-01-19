<?php
session_start();
require_once("..\conn.php");

$name = $_GET["name"];
$sql = "SELECT * FROM `food` WHERE `f_name` LIKE '%$name%' AND `f_status` != '3'";
$r = mysqli_query($conn, $sql);
$num = mysqli_num_rows($r);
if ($num > 0) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../link.php'); ?>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <title>ข้อมูลอาหาร</title>
    </head>

    <body>
        <?php include_once('headerbar.php') ?>



        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="header d-flex justify-content-center h2 mb-3">ข้อมูลอาหาร</div>

                    <form action="find_food_data.php" method="get" class="d-flex justify-content-center">
                        <input type="text" name="name" class="form-control me-2">
                        <button type="submit" class="btn btn-success">Find</button>
                    </form>

                    <table class="table">

                        <tr>
                            <th>
                                <div class="text-thead">รหัสร้านอาหาร</div>
                            </th>
                            <th>
                                <div class="text-thead">ชื่อร้านอาหาร</div>
                            </th>
                            <th>
                                <div class="text-thead">ราคาอาหาร</div>
                            </th>
                            <th>
                                <div class="text-thead">ประเภทอาหาร</div>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php while ($row = mysqli_fetch_row($r)) { ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row[0]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[2]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[3]; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="button-green"
                                            onclick="location.href='edit_form_food.php?f_id=<?php echo $row[0]; ?>'">
                                            <div class="text-type-name">แก้ไข</div>
                                        </button>


                                    </td>
                                    <td><button class="button-yellow" type="button"
                                            onclick="location.href='update_status_food.php?f_id=<?php echo $row[0]; ?>'">
                                            <?php
                                            $statuslist = array('1' => "คงเหลือ", '2' => "สินค้าหมด");
                                            $f_status = $row[4];
                                            echo '<div class="text-type-name">' . $statuslist[$f_status] . '</div>';
                                            ?>
                                        </button>
                                    </td>
                                    <td><button class="button-red" type="button"
                                            onclick="location.href='delete_food.php?f_id=<?php echo $row[0]; ?>'">
                                            <div class="text-type-name">ลบ</div>
                                        </button></td>

                                </tr>
                            <?php }
} ?>
                </table>


            </div>
        </div>
    </div>

    <footer class="footer">
        <button type="button" class="button-green"
            onclick="location.href='add_form_food.php'">
            <div class="text-type-name">เพิ่ม</div></a>
    </footer>
</body>

<?php include('../script.php'); ?>

</html>