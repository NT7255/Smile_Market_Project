<?php
session_start();
include "connect.php";

// ฟังก์ชันสำหรับคำนวณราคารวมทั้งหมดในตะกร้า
$total_price = 0;
$has_items = !empty($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า - Smile Market</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="ordergoods_card.css">
</head>
<body>
    <?php include "tab-above-user2.php"; ?> 

    <div class="start-heading">สินค้าที่บันทึกในรถเข็นของคุณ</div>
    
    <main class="cart-container <?php echo $has_items ? 'has-items' : ''; ?>">

    <?php if (!$has_items): ?>
        <div class="cart-empty">
            <h2>ตะกร้าสินค้าของคุณยังว่าง</h2>
            <p>เมื่อคุณเพิ่มสินค้า สินค้าจะปรากฏที่นี่</p>
            <br>
            <a href="homepage.php" style="text-decoration: none;">
                <button class="checkout-btn" style="width: auto; padding: 10px 30px;">ไปเลือกซื้อสินค้า</button>
            </a>
        </div>
    <?php else: ?>
        
        <div class="cart-list">
            <?php
            // วนลูปรายการสินค้าที่เก็บอยู่ใน Session
            foreach ($_SESSION['cart'] as $p_id => $qty) {
                $sql = "SELECT * FROM tb_product WHERE pro_id = '$p_id'";
                $res = mysqli_query($conn, $sql);
                if ($product = mysqli_fetch_array($res)) {
                    $item_total = $product['pro_price'] * $qty;
                    $total_price += $item_total;
            ?>
                <div class="cart-item">
                    <div class="item-image">
                        <img src="images/goods/<?php echo $product['pro_image']; ?>" alt="<?php echo $product['pro_name']; ?>">
                    </div>

                    <div class="item-info">
                        <h3 class="item-name"><?php echo $product['pro_name']; ?></h3>
                        <p class="item-price">฿<?php echo number_format($product['pro_price'], 2); ?></p>
                    </div>

                    <div class="item-qty">
                        <a href="cart_action.php?pro_id=<?php echo $p_id; ?>&act=remove_one" style="text-decoration:none;">
                            <button class="qty-btn">-</button>
                        </a>
                        
                        <span class="qty-number"><?php echo $qty; ?></span>
                        
                        <a href="cart_action.php?pro_id=<?php echo $p_id; ?>&act=add" style="text-decoration:none;">
                            <button class="qty-btn">+</button>
                        </a>
                    </div>

                    <a href="cart_action.php?pro_id=<?php echo $p_id; ?>&act=delete" style="text-decoration:none;">
                        <button class="red-bt">
                            ... (รูปถังขยะ) ...
                        </button>
                    </a>
                </div>
            <?php 
                } 
            } 
            ?>
        </div>

        <div class="cart-summary">
            <div class="summary-row">
                <span>ราคารวมทั้งหมด</span>
                <span class="summary-price">฿<?php echo number_format($total_price, 2); ?></span>
            </div>
            <button class="checkout-btn"><b>ชำระเงิน</b></button>
        </div>

    <?php endif; ?>

    </main>
</body>
</html>