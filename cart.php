<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-user2.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user2.php ด้วย-->
    หน้ารถเข็น
    <main class="cart-container has-items">

    <!-- Empty State -->
    <div class="cart-empty">
        <h2>ตะกร้าสินค้าของคุณยังว่าง</h2>
        <p>เมื่อคุณเพิ่มสินค้า สินค้าจะปรากฏที่นี่</p>
    </div>

    <!-- รายการสินค้า 1 -->
    <div class="cart-list">

        <div class="cart-item">
            <div class="item-image">
                <img src="images/product1.jpg" alt="สินค้า">
            </div>

            <div class="item-info">
                <h3 class="item-name">หมูสด</h3>
                <p class="item-price">฿140</p>
            </div>

            <div class="item-qty">
                <button class="qty-btn">-</button>
                <span class="qty-number">1</span>
                <button class="qty-btn">+</button>
            </div>

            <button class="remove-btn">🗑</button>
        </div>
        <!--สินค้า 2-->
        <div class="cart-item">
            <div class="item-image">
                <img src="images/product2.jpg" alt="สินค้า">
            </div>

            <div class="item-info">
                <h3 class="item-name">หมูบด</h3>
                <p class="item-price">฿100</p>
            </div>

            <div class="item-qty">
                <button class="qty-btn">-</button>
                <span class="qty-number">1</span>
                <button class="qty-btn">+</button>
            </div>

            <button class="remove-btn">🗑</button>
        </div>
        <!--สินค้า 3-->
        <div class="cart-item">
            <div class="item-image">
                <img src="images/product3.jpg" alt="สินค้า">
            </div>

            <div class="item-info">
                <h3 class="item-name">อกไก่</h3>
                <p class="item-price">฿80</p>
            </div>

            <div class="item-qty">
                <button class="qty-btn">-</button>
                <span class="qty-number">1</span>
                <button class="qty-btn">+</button>
            </div>

            <button class="remove-btn">🗑</button>
        </div>
    </div>

    <!-- สรุปราคา -->
    <div class="cart-summary">
        <div class="summary-row">
            <span>ราคารวม</span>
            <span class="summary-price">฿320</span>
        </div>
        <button class="checkout-btn">ชำระเงิน</button>
    </div>

</main>

</body>
</html>