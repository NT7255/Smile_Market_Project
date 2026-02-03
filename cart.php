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

            <button class="red-bt">
                <div class="content-center">
                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M17 6V4c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H2v2h2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8h2V6zM9 4h6v2H9zM6 20V8h12v12z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg> <b>ลบ</b>
                </div>
            </button>
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

            <button class="red-bt">
                <div class="content-center">
                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M17 6V4c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H2v2h2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8h2V6zM9 4h6v2H9zM6 20V8h12v12z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg> <b>ลบ</b>
                </div>
            </button>
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

            <button class="red-bt">
                <div class="content-center">
                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M17 6V4c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H2v2h2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8h2V6zM9 4h6v2H9zM6 20V8h12v12z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg> <b>ลบ</b>
                </div>
            </button>
        </div>
    </div>

    <!-- สรุปราคา -->
    <div class="cart-summary">
        <div class="summary-row">
            <span>ราคารวม</span>
            <span class="summary-price">฿320</span>
        </div>
        <button class="checkout-btn"><b>ชำระเงิน</b></button>
    </div>

</main>

</body>
</html>