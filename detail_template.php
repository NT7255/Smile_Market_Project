<?php
include "connect.php";

// ดึงข้อมูลสินค้าพร้อมชื่อหมวดหมู่
$sql = "SELECT p.*, c.cat_id, c.cat_name FROM tb_product p 
        LEFT JOIN tb_tag t ON p.pro_id = t.pro_id 
        LEFT JOIN tb_category c ON t.cat_id = c.cat_id
        WHERE p.pro_id = '$pro_id'";
$res = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($res);

if(!$item) { echo "ไม่พบข้อมูลสินค้า"; exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item['pro_name']; ?></title>
    <link rel="stylesheet" href="detail.css"> <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="yellow_bg.css">
</head>
<body class="yellow_bg">
    <?php include "tab-above-user2.php"; ?> 

    <div class="main_size2">
        <div class="small_cate_link">
            <a class="adr-link" href="homepage.php">หน้าหลัก</a> 
            <span class="next">></span> 
            <a class="adr-link" href="homepage.php?cat_id=<?php echo $item['cat_id']; ?>"><?php echo $item['cat_name']; ?></a> 
            <span class="next">></span> 
            <a class="adr-link" href=""><?php echo $item['pro_name']; ?></a>
        </div>

        <div class="zones">
            <div class="left_zone">
                <img class="seeing_image" src="images/goods/<?php echo $item['pro_image']; ?>" alt="">
            </div>

            <div class="center_zone">
                <div class="center_zone_r1">
                    <div class="sub-heading"><?php echo $item['pro_name']; ?></div>
                    <div class="oneline">
                        <p class="title-is16px"><b>ID :&nbsp;</b></p>
                        <p class="l-is16px"><?php echo $item['pro_id']; ?></p>
                    </div>
                </div>
                <div class="center_zone_r2">
                    <span class="l-is16px"><?php echo $item['pro_subinfo']; ?></span>
                </div>
                <div class="center_zone_r3">
                    <div class="oneline">
                        <p class="title-is16px"><b>สถานะ :&nbsp;</b></p>
                        <p class="l-is16px">พร้อมจำหน่าย</p>
                    </div>
                </div>
            </div>

            <div class="right_zone">
                <div>
                    <p class="price">฿<?php echo number_format($item['pro_price'], 2); ?> /หน่วย</p>
                    <a href="cart_action.php?pro_id=<?php echo $item['pro_id']; ?>">
                        <button class="small-button-or2">เพิ่มลงรถเข็น</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div class="detail_zone">
            <p class="title-is16px"><b>รายละเอียดสินค้า</b></p>
            <p class="l-is16px"><?php echo nl2br($item['pro_info']); ?></p>
        </div>
    </div>
</body>
</html>