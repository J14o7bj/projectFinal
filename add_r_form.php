<?php
session_start();
require_once("conn.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <title>Add</title>
</head>

<body>

    <form action="add_r.php" method="post" class="" style="padding: 50px;">
        <div class="container mt-5">
            <div class="row-auto">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="header mb-4">
                                <h3>เพิ่มข้อมูลร้านอาหาร</h3>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="ft_id" class="form-control">
                                <label for="name" class="">ชื่อ</label>
                                <input type="text" name="ft_name" class="form-control">
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
</body>
<script src="../asset/css/bootstrap.min.js"></script>

</html>