<?php
session_start();
include('../conn.php');

if ($_POST) {
    if (isset($_FILES['upload'])) {
        $name_file = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $locate_img = "../img/slip/";
        move_uploaded_file($tmp_name, $locate_img . $name_file);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>

    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="mobile_styles.css">
    <style>
        .card-lg {
            /* background-color: #8C7E60; */
            border-radius: 10px;
            height: 437.29px;
            /* width: 300px; */
            /* margin-left: 30px; */
        }

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

        .btn-head img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .imgForm {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #upload {
            display: block;
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="flex"><button class="btn-head" onclick="location.href='cart.php?t_id=<?php echo $_SESSION['table'] ?>'">
            <img width="30" height="25" src="https://cdn-icons-png.flaticon.com/128/271/271220.png">
        </button></div>
    <div class="card-lg" style="margin-top: 10px;">
        <center>
            <img width="300"
                src="https://cdn.discordapp.com/attachments/795320043826053130/1195005241653989427/004999135380748_20230518_104020.jpg?ex=65b26a5b&is=659ff55b&hm=02fd1f2599ad93075508c9c00fdfa994a0ec2d0333a78bcb4d5518aa38ee28c5&"
                alt="">
            <div class="thai-text-head" style="font-size: 11px">
                กรุณาบันทึกรูปภาพแล้วเพื่อชำระเงิน และแนบสลิปด้านล่างนี้เพื่อดำเนินขั้นตอนต่อไป
            </div>
            <form action="upload.php?t_id=<?php echo $_SESSION['table'] ?>" method="post" enctype="multipart/form-data">
                <label class="thai-text-head" for="file"> สลิปชำระเงิน </label>
                <input type="file" name="file" id="file" required>
                <button class="button-green" type="submit" name="upload" value="upload"
                    style="color: #ffffff;">Upload</button>
            </form>




            </form>
        </center>

    </div>

</body>

</html>