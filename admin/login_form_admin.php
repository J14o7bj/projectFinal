<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบผู้ดูแล</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <style>
        body {
            background-color: #5B4E44;
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

    <form action="login_db_admin.php" method="post" class="" style="padding: 50px;">
        <div class="container mt-5" style="width: fit-content;">
            <div class="row-auto">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="header mb-4">
                                <h3>เข้าสู่ระบบ</h3>
                            </div>
                            <div class="form-group">
                                <label for="a_user" class="">ชื่อผู้ใช้</label>
                                <input type="text" name="a_user" class="form-control">
                                <label for="a_pass" class="">รหัสผ่าน</label>
                                <input type="password" name="a_pass" class="form-control">
                            </div>
                            <button class="btn btn-success m-2" type="submit">ตกลง</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<?php include('../script.php'); ?>

</html>