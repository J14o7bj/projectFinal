<?php
session_start();
include('../conn.php');

$search_query = isset($_GET['name']) ? $_GET['name'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFE</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="mobile_styles.css">
</head>

<body>
    <?php include('users_bar.php'); ?>
    <div class="container-fluid">

        <!-- search bar -->
        <form action="find_menu.php" method="get" class="d-flex justify-content-center" style="margin-top: 10px;">
                        <input type="text" name="name" class="form-control me-2">
                        <button type="submit" class="button-green" style="font-family: 'Noto Sans Thai', sans-serif;">ค้นหา</button>
        </form>
        <!--  -->
        <div class="row">


            <div class="col">
                <div class="flex">
                    <div class="card-type" onmousedown="startDrag(event)">

                        <!-- type-card -->
                        <?php
                        $ftsql = "SELECT * FROM `food_type` WHERE `ft_status` = 'Y'";
                        $ftr = mysqli_query($conn, $ftsql);
                        $ftnum = mysqli_num_rows($ftr);
                        if ($ftnum > 0) {
                            while ($ftrow = mysqli_fetch_array($ftr)) {
                                ?>
                                <div class="card-type-mini " onclick="location.href='find_type.php?ft_id=<?php echo $ftrow[0]; ?>'">
                                    <div class="text-type-name">
                                        <?php echo $ftrow[1]; ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                        <!-- -->

                    </div>
                </div>
                <div class="flex">
                    <div class="card-list">

                        <?php
                        $fsql = "SELECT * FROM `food` WHERE `f_status` != '3'";
                        if ($search_query) {
                            $fsql .= " AND `f_name` LIKE '%$search_query%'";
                        }
                        $fr = mysqli_query($conn, $fsql);
                        $fnum = @mysqli_num_rows($fr);
                        if ($fnum > 0) {
                            while ($frow = mysqli_fetch_array($fr)) {
                                $f_status = $frow[4];
                                
                                    ?>
                                    <div class="card-menu-area" style="display: flex; justify-content: space-between; background-color: white; border-radius: 10px; padding: 10px;"">
                                        <?php
                                        if ($frow[6] == null) {
                                            ?>
                                            <div class="card-menu" style="margin-right: 5px;">
                                                <div class="text-add-img"><img src="https://s3-alpha-sig.figma.com/img/b55e/7bc5/90b3119ed904222e9ef6fef6f49a81f0?Expires=1705881600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=I6b7HhzgpN~NS~TTOsN0KbXaYC8cxYRGQ6fKw70noVar-OTUqI9yUSYPziJGCtDXNrb~b7oOPSi1ZjVtbsND28NLXSvV9doG-RQu~gbzbZJ3x7uZea0rNY0Di95ns1uj-Af~a5r7EFXHcYvrc~~wnx~WFp19swyRxEiJYMM4NnC1D8v6jXWv7CHDVXJ2sXF2v5dt4X7tM5e4qPgk7TFBrnfq8NPxrKsZxXm6o1wDPVYPmebLpkIbjM27jU8rO4~cPZbg6PugaP6NhyRyFcVluBwwgUK4NxCgzWW~BRLOzmg2XVUKvvnIt4FIgLUQ0SEyQ2D1f2IRH7Pa6yaTo6Za0g__" alt=""></div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card-menu" style="margin-right: 5px;"><img src="../img/<?php echo $frow[6]; ?>">
                                            </div>
                                        <?php } ?>

                                        <div class="text-name-option-group" style="width: 175px;">

                                            <div class="text-name-option" style="font-size: 18px; color: #5B4E44;">
                                                <?php echo $frow[1] ?>
                                            </div>
                                            <div class="text-name-option" style="font-size: 14px; color: #5B4E44;">
                                                ราคา <?php echo $frow[2] ?> บาท
                                            </div>
                                            
                                        </div>
                                        <?php 
                                        if($f_status == 1){
                                        ?>
                                            <div class="text-name-option" style="display: flex;
                                                                                align-items: flex-end;">
                                                <button class="circle-mini"  onclick="location.href='add_form_order.php?f_id=<?php echo $frow[0] ?>'">
                                                +
                                                </button>
                                            </div>
                                        <?php }else{ ?> 
                                            <div class="text-name-option" style="display: flex;
                                                                                align-items: flex-end;">
                                                    <div style="width: 20px;">
                                                        <div class="text-thai-body" style="color: #DC7862;">
                                                            หมด
                                                        </div>
                                                    </div>
                                                
                                            </div>   
                                        <?php } ?>
                                    </div>

                                        


                                <?php 
                            }
                            
                        }else{ ?>
                            <div class="thai-text-head" style="display: flex; justify-content: center;"> ไม่พบรายการที่ค้นหา </div>
                        <?php } ?>

                    </div>
                </div>
            </div>


        </div>
        <!--  -->
    </div>

    <script>
        let isDragging = false;
        let startX;
        let scrollLeft;

        function startDrag(e) {
            isDragging = true;
            if (e.type === 'touchstart') {
                startX = e.touches[0].pageX - document.querySelector('.card-type').offsetLeft;
            } else {
                startX = e.pageX - document.querySelector('.card-type').offsetLeft;
            }
            scrollLeft = document.querySelector('.card-type').scrollLeft;

            document.addEventListener('mousemove', drag);
            document.addEventListener('touchmove', drag);
            document.addEventListener('mouseup', stopDrag);
            document.addEventListener('touchend', stopDrag);
            document.addEventListener('mouseleave', stopDrag);
        }

        function drag(e) {
            if (!isDragging) return;
            let x;
            if (e.type === 'touchmove') {
                x = e.touches[0].pageX - document.querySelector('.card-type').offsetLeft;
            } else {
                x = e.pageX - document.querySelector('.card-type').offsetLeft;
            }
            const distance = (x - startX) * 2; // Adjust the multiplier for desired sensitivity
            document.querySelector('.card-type').scrollLeft = scrollLeft - distance;
        }

        function stopDrag() {
            isDragging = false;
            document.removeEventListener('mousemove', drag);
            document.removeEventListener('touchmove', drag);
            document.removeEventListener('mouseup', stopDrag);
            document.removeEventListener('touchend', stopDrag);
            document.removeEventListener('mouseleave', stopDrag);
        }

        document.querySelector('.card-type').addEventListener('mousedown', startDrag);
        document.querySelector('.card-type').addEventListener('touchstart', startDrag);

    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>