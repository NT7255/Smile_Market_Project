<?php
// 1. ดึงไฟล์เชื่อมต่อฐานข้อมูลมาใช้งานก่อนเป็นอันดับแรก
include "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smile Market - หน้าแรก</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="tab-menu.css">
    <link rel="stylesheet" href="logout.css">
    <style>
        /* CSS เพิ่มเติมเพื่อจัดหน้าให้สวยงามและคุมปุ่ม Active */
        .ads img { width: 100%; height: auto; }
        .main_size { max-width: 1200px; margin: 0 auto; padding: 20px; }
        
        /* สไตล์ปุ่มหมวดหมู่ */
        .category { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 20px; }
        .cate_bt { 
            padding: 8px 18px; background-color: white; border: 1px solid #ddd; 
            border-radius: 20px; cursor: pointer; transition: 0.3s; 
        }
        .cate_bt:hover { background-color: #f0f0f0; }
        
        /* สไตล์เมื่อปุ่มถูกเลือก (Active) - สีส้ม */
        .cate_bt.active { 
            background-color: #FF8A00 !important; 
            color: white !important; 
            border-color: #FF8A00 !important; 
        }

        /* จัด Grid สินค้า */
        .goods_cate { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 20px; }
        
        /* สไตล์ Card สินค้า */
        .goods { border: 1px solid #eee; border-radius: 8px; overflow: hidden; background: white; transition: 0.3s; }
        .goods:hover { box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .goods_img { width: 100%; height: 200px; object-fit: cover; }
        .goods_info { padding: 15px; }
        .sub-heading { font-size: 16px; font-weight: bold; margin: 0 0 10px 0; color: #333; }
        .price { font-size: 18px; color: #FF8A00; font-weight: bold; margin: 0 0 15px 0; }
        .add-hp-button-or2 { 
            width: 100%; padding: 10px; background-color: #FF8A00; color: white; 
            border: none; border-radius: 4px; cursor: pointer; font-weight: bold; 
        }
        .line { border-top: 1px solid #eee; margin: 20px 0; }
    </style>
</head>
<body>
    <?php include "tab-above-homepage.php"; ?> 

    <div class="ads">
        <img src="images/banner.jpg" alt="Banner"> 
    </div>

    <div class="main_size">
        <div class="category">
            <?php
            // รับค่า cat_id จาก URL ถ้าไม่มีให้เป็นค่าว่าง
            $current_cat = isset($_GET['cat_id']) ? $_GET['cat_id'] : '';
            ?>
            
            <a href="homepage.php" style="text-decoration:none;">
                <button class="cate_bt <?php echo ($current_cat == '') ? 'active' : ''; ?>">ทั้งหมด</button>
            </a>

            <?php
            // ดึงประเภทสินค้ามาสร้างปุ่ม
            $res_btn = mysqli_query($conn, "SELECT * FROM tb_category");
            if ($res_btn) {
                while($btn = mysqli_fetch_array($res_btn)) {
                    // เช็คว่า cat_id ของปุ่มนี้ ตรงกับที่เลือกอยู่หรือไม่
                    $active_class = ($current_cat == $btn['cat_id']) ? 'active' : '';
                    echo '<a href="homepage.php?cat_id='.$btn['cat_id'].'" style="text-decoration:none;">
                            <button class="cate_bt '.$active_class.'">'.$btn['cat_name'].'</button>
                          </a>';
                }
            }
            ?>
        </div>

        <div class="line"></div>

        <div class="goods_cate">
            <?php
            // เช็คว่ามีการคลิกเลือกหมวดหมู่มาไหม เพื่อสร้าง SQL Query
            if(!empty($current_cat)) {
                // ดึงเฉพาะสินค้าในหมวดที่เลือก (ต้อง Join กับ tb_tag)
                $sql_pro = "SELECT p.* FROM tb_product p 
                            INNER JOIN tb_tag t ON p.pro_id = t.pro_id 
                            WHERE t.cat_id = '$current_cat'
                            ORDER BY p.pro_id DESC";
            } else {
                // ถ้าไม่ได้เลือก (หน้าแรก) ให้ดึงสินค้าทั้งหมดมาโชว์
                $sql_pro = "SELECT * FROM tb_product ORDER BY pro_id DESC";
            }
            
            $res_pro = mysqli_query($conn, $sql_pro);

            // วนลูปแสดงสินค้า
            if($res_pro && mysqli_num_rows($res_pro) > 0) {
                while($product = mysqli_fetch_array($res_pro)) {
                    ?>
                    <div class="goods">
                        <a href="detail_template.php?pro_id=<?php echo $product['pro_id']; ?>">
                            <img class="goods_img" src="images/goods/<?php echo $product['pro_image']; ?>" alt="<?php echo $product['pro_name']; ?>">
                        </a>
                        <div class="goods_info">
                            <a href="detail_template.php?pro_id=<?php echo $product['pro_id']; ?>">
                                <p class="sub-heading"><?php echo $product['pro_name']; ?></p>
                            </a>
                            <p class="price">฿<?php echo number_format($product['pro_price'], 2); ?></p>
                            <a href="cart_action.php?pro_id=<?php echo $product['pro_id']; ?>" style="text-decoration:none;">
                                <button class="add-hp-button-or2">+ เพิ่ม</button>
                            </a>
                        </div>
                    </div>
                    <?php 
                }
            } else {
                // ถ้าไม่มีสินค้าในหมวด
                echo "<p style='grid-column: 1/-1; text-align:center; color:#888; padding: 50px 0;'>--- ไม่มีสินค้าในหมวดหมู่นี้ ---</p>";
            }
            ?>
        </div>
    </div>

    <?php include "tab-menu.php"; ?>
</body>
</html>