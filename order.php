<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="ordergoods_card.css">
</head>
<body>
    <?php include "tab-above-user2.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user2.php ด้วย-->
    <div class="start-heading">รายละเอียดคำสั่งซื้อของคุณ</div>
    <div class="cart-container has-items">

    <!-- ข้อมูลลูกค้า -->
        <div class="order_info">

            <div class="left_info">
                <p>สั่งซื้อเมื่อ : <span>10-11-2025 18:55:23</span></p>
                <p>ชื่อ-นามสกุล : <span>ณัฐพล ตระกูลบางคล้า</span></p>
                <p>เบอร์โทร : <span>0112223333</span></p>
                <p>หมายเลขพัสดุ : <span>TH00000031</span></p>
            </div>

            <div class="right_info">
                <p>วิธีการจัดส่ง : <span>EMS</span></p>
                <p>ที่อยู่ : <span>
                    เลขที่ 1 ถนนระราบที่ 2 <br>
                    แขวงจอมทอง เขตจอมทอง <br>
                    กรุงเทพมหานคร 10150
                </span></p>
            </div>

        </div>

        <hr>

        <!-- รายการสินค้า -->
        <div class="cart-list">

            <!-- สินค้า 1 -->
            <div class="cart-item">

                <div class="item-image">
                    <img src="images/minced-pork.jpg">
                </div>

                <div class="item-info">
                    <div class="item-name">เนื้อวัว A5</div>
                    <div class="item-price">฿580.00</div>
                </div>

                <div class="product_qty">
                    จำนวน : 1 รายการ
                </div>

            </div>

            <!-- สินค้า 2 -->
            <div class="cart-item">

                <div class="item-image">
                    <img src="images/minced-pork.jpg">
                </div>

                <div class="item-info">
                    <div class="item-name">แครอท</div>
                    <div class="item-price">฿36.00</div>
                </div>

                <div class="product_qty">
                    จำนวน : 3 รายการ
                </div>

            </div>

        </div>
        <hr>
        <!-- สรุปราคา -->
        <div class="summary">

            <div class="summary_row">
                <span>ค่าส่ง :</span>
                <span>฿40</span>
            </div>

            <div class="summary_row total">
                <span>ยอดรวมทั้งสิ้น :</span>
                <span>฿656</span>
            </div>

        </div>

    </div>
</body>
</html>