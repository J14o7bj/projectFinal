<?php

require_once("../conn.php");

$f_id = $_GET['f_id'];

if ($_POST) {
    if (isset($_FILES['upload'])) {
        $name_file = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $locate_img = "../img/";
        move_uploaded_file($tmp_name, $locate_img . $name_file);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../link.php'); ?>
        <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
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

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form class="imgForm" action="upload.php?f_id=<?php echo $f_id?>" method="post" enctype="multipart/form-data">
        <label for="file">IMAGE</label>
        <input type="file" name="file" id="upload" required>
        <button type="submit" name="upload" value="upload">Upload</button>
    </form>
</body>
<?php include('../script.php'); ?>
</html>
