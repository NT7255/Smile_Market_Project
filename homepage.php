<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="goods_card.css">
    <link rel="stylesheet" href="category_button.css">
</head>
<body>
    <?php include "tab-above-homepage.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user2.php ด้วย-->
    <div class="ads">
        <img class="" src="">
    </div>
    <div class="main_size">
        <!-- โฆษณา -->
        <div>
            <h1>ประเภทสินค้า</h1>
            <!-- ประเภท -->
            <div class="category">
                <button class="cate_bt">สินค้าทั้งหมด</button>
                <button class="cate_bt_non">อาหารสัตว์และทะเล</button>
            </div>
            <div class="line"></div>
        </div>  
        <!-- กลุ่มประเภทสินค้า 1 -->
        <div class="goods_cate"> 
            <h1>อาหารสัตว์และทะเล</h1> 
            <div class="goods_floor">
                <!-- สินค้า 1 -->
                <div class="goods">
                    <img class="goods_img" src="images/goods/fresh_food/Wakyu_A5.jpg">
                    <div class="left-center-right">
                        <button class="add-hp-button-or2">+ เพิ่ม</button>
                    </div>
                    <div class="padding-10px-left-right">
                        <p class="sub-heading">เนื้อวัว A5</p>
                        <div class="detail-size"><p class="detail">เป็นเนื้อที่ถูกคัดสรรนำเข้าจากญี่ปุ่นโดยตรง เนื้อสด หนุ่ม และอร่อย</p></div>
                        <p class="price">฿580.00 /กก.</p>
                    </div>
                </div>
                <!-- สินค้า 2 -->
                <div class="goods">
                    <img class="goods_img" src="images/goods/fresh_food/Salmon.jpg">
                    <div class="left-center-right">
                        <button class="add-hp-button-or2">+ เพิ่ม</button>
                    </div>
                    <div class="padding-10px-left-right">
                        <p class="sub-heading">เนื้อปลาแซลมอนสด</p>
                        <div class="detail-size"><p class="detail">เป็นเนื้อปลาในน้ำจืด นำเข้าจากนอร์เวย์ สามารถทานได้ทันที</p></div>
                        <p class="price">฿250.00 /กก.</p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
        </div>
        
    </div>
</body>
</html>