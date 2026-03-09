<?php
include "connect.php"; // เชื่อมต่อฐานข้อมูลบรรทัดแรกสุดครั้งเดียว
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smile Market - หน้าแรก</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="goods_card.css">
    <link rel="stylesheet" href="category_button.css">
</head>
<body>
    <?php include "tab-above-homepage.php"; ?> 

    <div class="ads">
        <img class="" src="images/banner.jpg"> </div>

    <div class="main_size">
        <div class="category">
            <a href="homepage.php">
                <button class="<?php echo !isset($_GET['cat_id']) ? 'cate_bt' : 'cate_bt_non'; ?>">สินค้าทั้งหมด</button>
            </a>
            <?php
            $sql_cat_menu = "SELECT * FROM tb_category";
            $res_cat_menu = mysqli_query($conn, $sql_cat_menu);
            while($row_menu = mysqli_fetch_array($res_cat_menu)) {
                $active = (isset($_GET['cat_id']) && $_GET['cat_id'] == $row_menu['cat_id']) ? 'cate_bt' : 'cate_bt_non';
                echo '<a href="homepage.php?cat_id='.$row_menu['cat_id'].'"><button class="'.$active.'">'.$row_menu['cat_name'].'</button></a>';
            }
            ?>
        </div>
        <div class="line"></div>

        <?php
        // 1. กำหนดหมวดหมู่ที่จะดึงข้อมูล
        if(isset($_GET['cat_id'])) {
            $target_cat = $_GET['cat_id'];
            $sql_category = "SELECT * FROM tb_category WHERE cat_id = '$target_cat'";
        } else {
            $sql_category = "SELECT * FROM tb_category"; 
        }

        $res_category = mysqli_query($conn, $sql_category);

        // วนลูปหมวดหมู่
        while($row_cat = mysqli_fetch_array($res_category)) {
            $cat_id = $row_cat['cat_id'];
            
            // 2. ดึงสินค้าในหมวดหมู่นั้นๆ
            $sql_pro = "SELECT p.* FROM tb_product p 
                        INNER JOIN tb_tag t ON p.pro_id = t.pro_id 
                        WHERE t.cat_id = '$cat_id'";
            $res_pro = mysqli_query($conn, $sql_pro);

            // แสดงหัวข้อหมวดหมู่เฉพาะเมื่อมีสินค้าเท่านั้น
            if(mysqli_num_rows($res_pro) > 0) {
        ?>
            <div class="goods_cate"> 
                <h1><?php echo $row_cat['cat_name']; ?></h1> 
                <div class="goods_floor">
                    <?php
                    while ($product = mysqli_fetch_array($res_pro)) {
                        $detail_link = "detail_" . $product['pro_id'] . ".php";
                    ?>
                        <div class="goods">
                            <a href="<?php echo $detail_link; ?>">
                                <img class="goods_img" src="images/goods/<?php echo $product['pro_image']; ?>">
                            </a>
                            
                            <div class="left-center-right">
                                <a href="cart_action.php?pro_id=<?php echo $product['pro_id']; ?>">
                                    <button class="add-hp-button-or2">+ เพิ่ม</button>
                                </a>
                            </div>

                            <div class="padding-10px-left-right">
                                <p class="sub-heading"><?php echo $product['pro_name']; ?></p>
                                
                                <div class="detail-size">
                                    <p class="detail"><?php echo $product['pro_subinfo']; ?></p>
                                </div>

                                <p class="price">
                                    ฿<?php echo number_format($product['pro_price'], 2); ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="line"></div>
            </div>
        <?php 
            } // end if check products
        } // end while category loop
        ?>
    </div>
</body>
</html>