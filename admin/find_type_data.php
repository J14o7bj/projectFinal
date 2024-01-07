<?php
session_start();
require_once("..\conn.php");

$name = $_GET["name"];
$sql = "SELECT * FROM `food_type` WHERE `ft_name` LIKE '%$name%' AND `ft_status` = 'Y'";
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
        <title>Type Data</title>
    </head>

    <body>
        <?php include_once('headerbar.php') ?>



        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="header d-flex justify-content-center h2 mb-3">ข้อมูลประเภทอาหาร</div>

                    <form action="find_type_data.php" method="get" class="d-flex justify-content-center">
                        <input type="text" name="name" class="form-control me-2">
                        <button type="submit" class="btn btn-success">Find</button>
                    </form>

                    <table class="table">

                        <tr>
                            <th>
                                <div class="text-thead">รหัสประเภทร้านอาหาร</div>
                            </th>
                            <th>
                                <div class="text-thead">ชื่อประเภทร้านอาหาร</div>
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
                                        <button class="button-green"
                                            onclick="location.href='edit_type_data.php?ft_id=<?php echo $row['ft_id']; ?>'">
                                            <div class="text-type-name">แก้ไข</div>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button-red">
                                            <a class="text-type-name" href="delete_type.php?ft_id=<?php echo $row[0]; ?>">ลบ</a>
                                        </button>
                                    </td>

                                </tr>
                            <?php }
} ?>
                </table>


            </div>
        </div>
    </div>

    <footer class="footer">
        <a href="add_r_form.php" class="btn btn-success">ADD</a>
    </footer>
</body>

<?php include('../script.php'); ?>

</html>