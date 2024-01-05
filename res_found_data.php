<?php
session_start();
require_once("..\conn.php");

$name = $_GET["name"];
$sql = "SELECT * FROM `food_type` WHERE `ft_name` LIKE '%$name%'";
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
        <link rel="stylesheet" href="..\styles.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <title>Restuarant Data</title>
    </head>

    <body>
        <nav class="navbar navbar-info" style="background-color: lightblue;">
            <div class="navbar-brand">
                <!-- <a href="adminpage.php"> -->
                    <!-- <img src="..\image\delivery-man.png" width="28px" height="28px" alt="">&nbsp;</a> -->
                JOB CAFE
            </div>
        </nav>



        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="header d-flex justify-content-center h2 mb-3">ข้อมูลประเภทอาหาร</div>
                    <table class="table ">
                        <thead class="thead thead-dark">
                            <tr>
                                <th>รหัสประเภทร้าอาหาร</th>
                                <th>ชื่อประเภทร้านอาหาร</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="tbody-light">
                            <?php while ($row = mysqli_fetch_row($r)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row[0]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1]; ?>
                                    </td>
                                    <td><a class="btn-sm btn-info" href="edit_r_data.php?ft_id=<?php echo $row[0]; ?>">แก้ไข</a>
                                    </td>
                                    <td><a class="btn-sm btn-danger"
                                            href="delete_r_data.php?ft_id=<?php echo $row[0]; ?>">ลบข้อมูล</a></td>
                                </tr>
                            <?php }
} ?>
                    </tbody>
                </table>


                <form action="res_found_data.php" method="get" class="d-flex justify-content-center">
                    <input type="text" name="name" class="form-control me-2">
                    <button type="submit" class="btn btn-success">Find</button>
                </form>


            </div>
        </div>
    </div>

    <footer class="footer">
        <a href="add_r_form.php" class="btn btn-success">ADD</a>
    </footer>
</body>

<script src="../asset/js/bootstrap.min.js"></script>

</html>