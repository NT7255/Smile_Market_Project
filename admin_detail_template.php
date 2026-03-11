<?php
include "connect.php";
// รับค่า $pro_id จากไฟล์หลัก
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
    <title>Admin View: <?php echo $item['pro_name']; ?></title>
    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="yellow_bg.css">
    <link rel="stylesheet" href="logout.css">
    <style>
        /* สไตล์เพิ่มเติมสำหรับปุ่มจัดการของแอดมิน */
        .admin-action-box {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .btn-admin-edit { 
            background-color: #4caf50 !important; 
            color: white !important; 
            border: none; 
            padding: 12px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            width: 100%;
            font-size: 16px;
        }
        .btn-admin-delete { 
            background-color: #f44336 !important; 
            color: white !important; 
            border: none; 
            padding: 12px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            width: 100%;
            font-size: 16px;
        }
        .admin-label {
            background: #333;
            color: #fff;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="yellow_bg">
    <?php include "tab-above-admin-homepage.php"; ?>

    <div class="main_size2">
        <div class="small_cate_link">
            <a class="adr-link" href="admin_homepage.php">หน้าหลักแอดมิน</a> 
            <span class="next">></span> 
            <a class="adr-link" href="#"><?php echo $item['cat_name']; ?></a> 
            <span class="next">></span> 
            <span style="color: #666;"><?php echo $item['pro_name']; ?></span>
        </div>

        <div class="zones">
            <div class="left_zone">
                <img class="seeing_image" src="images/goods/<?php echo $item['pro_image']; ?>" alt="Product">
            </div>

            <div class="center_zone">
                <div class="center_zone_r1">
                    <span class="admin-label">โหมดผู้ดูแลระบบ</span>
                    <div class="sub-heading"><?php echo $item['pro_name']; ?></div>
                    <div class="oneline">
                        <p class="title-is16px"><b>ID :&nbsp;</b></p>
                        <p class="l-is16px"><?php echo $item['pro_id']; ?></p>
                    </div>
                </div>
                <div class="center_zone_r2">
                    <p class="l-is16px"><?php echo $item['pro_subinfo']; ?></p>
                </div>
                <div class="center_zone_r3">
                    <div class="oneline">
                        <p class="title-is16px"><b>หมวดหมู่ :&nbsp;</b></p>
                        <p class="l-is16px"><?php echo $item['cat_name']; ?></p>
                    </div>
                </div>
            </div>

            <div class="right_zone">
                <div>
                    <p class="price">฿<?php echo number_format($item['pro_price'], 2); ?> /หน่วย</p>
                    
                    <div class="admin-action-box">
                        <a href="admin_goods_edit.php?pro_id=<?php echo $item['pro_id']; ?>" style="text-decoration: none;">
                            <button class="btn-admin-edit">แก้ไขข้อมูล</button>
                        </a>
                        <a href="admin_goods_delete.php?pro_id=<?php echo $item['pro_id']; ?>" 
                           onclick="return confirm('คุณต้องการลบสินค้านี้ใช่หรือไม่?')" 
                           style="text-decoration: none;">
                            <button class="btn-admin-delete">ลบสินค้านี้</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div class="detail_zone">
            <p class="title-is16px"><b>รายละเอียดสินค้า</b></p>
            <p class="l-is16px" style="line-height: 1.8;"><?php echo nl2br($item['pro_info']); ?></p>
        </div>
        
        <div style="margin-top: 40px; text-align: center;">
            <a href="admin_homepage.php" style="color: #888; text-decoration: none;">← กลับไปหน้าจัดการสินค้า</a>
        </div>
    </div>
</body>
</html>