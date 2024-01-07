<!-- <two> -->
<div class="card-list">

<table>
<tr class="table-head-row">
                            <th>
                                <div class="text-thead">ชื่อร้านอาหาร</div>
                            </th>
                            <th><div class="text-thead"> ราคา</div></th>
                            <th><div class="text-thead">ประเภทอาหาร</div></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
        <?php
        $sql2 = "SELECT * FROM `food` WHERE `f_status` != '3'";
        $r2 = mysqli_query($conn, $sql2);
        $num2 = mysqli_num_rows($r2);
        if ($num2 > 0) {
            while ($row2 = mysqli_fetch_row($r2)) {
                ?>
                <tr class="table-row ">
                    <td>
                        <div class="row row-center" style="width: 200px;">

                            <div class="col">
                                <a class="text-add-img" href="add_img.php?f_id=<?php echo $row2[0]; ?>">
                                    <?php
                                    if ($row2[6] == null) {
                                        ?>
                                        <div class="image-box">
                                            <div class="text-add-img">เพิ่มรูป</div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-box"><img src="../img/<?php echo $row2[6]; ?>"></div>
                                    <?php } ?>

                                </a>

                            </div>
                            <div class="col" >
                                <?php echo $row2[1]; ?>
                            </div>
                        </div>
                    </td>
                    <td style="width: 100px;">
                        <?php echo $row2[2]; ?> B
                    </td>
                    <td style="width: 200px;">
                    <?php
                                            $ft_id = $row2[5];
                                            $sql1 = "SELECT *
                                            FROM `food_type`
                                            INNER JOIN `food` ON `food_type`.`ft_id` = $ft_id
                                            WHERE `ft_status` = 'Y' AND `f_id` = $row2[0];;
                                            ";
                                            $r1 = mysqli_query($conn, $sql1);
                                            $num = mysqli_num_rows($r1);
                                            if($num > 0){
                                                while ($roww = mysqli_fetch_row($r1)) {
                                                    echo $roww[1];
                                                }
                                            }
                                            ?>
                    </td>
                    <td>
                        <button type="button" class="button-green"
                            onclick="location.href='edit_form_food.php?f_id=<?php echo $row2[0]; ?>'">
                            <div class="text-type-name">แก้ไข</div>
                        </button>
                        <button class="button-yellow" type="button"
                            onclick="location.href='update_status_food.php?f_id=<?php echo $row2[0]; ?>'">
                            <?php
                            $statuslist = array('1' => "คงเหลือ", '2' => "สินค้าหมด");
                            $f_status = $row2[4];
                            echo '<div class="text-type-name">' . $statuslist[$f_status] . '</div>';
                            ?>
                        </button>

                        <button class="button-red" type="button"
                            onclick="location.href='delete_food.php?f_id=<?php echo $row2[0]; ?>'">
                            <div class="text-type-name">ลบ</div>
                        </button>
                    </td>
                <?php }
        }
        ?>
        </tr>

    </table>