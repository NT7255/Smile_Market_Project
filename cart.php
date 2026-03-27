<?php
session_start();

/* DEMO สินค้า 
   if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [
        1 => ['name'=>'หมูสด','price'=>140,'qty'=>1,'img'=>'product1.jpg'],
        2 => ['name'=>'หมูบด','price'=>100,'qty'=>1,'img'=>'product2.jpg'],
        3 => ['name'=>'อกไก่','price'=>80,'qty'=>1,'img'=>'product3.jpg']
    ];
}
*/

/* ACTION */
if(isset($_GET['action'])){

    $id = $_GET['id'];

    if($_GET['action'] == 'plus'){
        $_SESSION['cart'][$id]['qty']++;
    }

    if($_GET['action'] == 'minus'){

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]['qty']--;

        if($_SESSION['cart'][$id]['qty'] <= 0){
            unset($_SESSION['cart'][$id]);
        }

    }

}

    if($_GET['action'] == 'remove'){
        unset($_SESSION['cart'][$id]);
    }
    if($_GET['action'] == 'add'){

        $name = $_GET['name'];
        $price = $_GET['price'];
        $img = $_GET['img'];

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty']++;
    }else{
        $_SESSION['cart'][$id] = [
            'name'=>$name,
            'price'=>$price,
            'qty'=>1,
            'img'=>$img
        ];
    }
}
    header("Location: cart.php");
    exit();
}

/* TOTAL */
$total = 0;
foreach($_SESSION['cart'] as $item){
    $total += $item['price'] * $item['qty'];
}
?>
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
    <main class="cart-container <?php echo !empty($_SESSION['cart']) ? 'has-items' : ''; ?>">

    <!-- Empty State -->
    <div class="cart-empty">
        <h2>ตะกร้าสินค้าของคุณยังว่าง</h2>
        <p>เมื่อคุณเพิ่มสินค้า สินค้าจะปรากฏที่นี่</p>
    </div>

    <div class="cart-list">

    <?php foreach($_SESSION['cart'] as $id => $item){ ?>

    <div class="cart-item">

    <div class="item-image">
        <img src="images/<?php echo $item['img']; ?>">
    </div>

    <div class="item-info">
        <h3 class="item-name"><?php echo $item['name']; ?></h3>
        <p class="item-price">฿<?php echo $item['price']; ?></p>
    </div>

    <div class="item-qty">

        <a href="cart.php?action=minus&id=<?php echo $id; ?>">
        <button class="qty-btn">-</button>
    </a>

        <span class="qty-number"><?php echo $item['qty']; ?></span>

        <a href="cart.php?action=plus&id=<?php echo $id; ?>">
        <button class="qty-btn">+</button>
    </a>

</div>

<a href="cart.php?action=remove&id=<?php echo $id; ?>">
<button class="remove-btn">🗑</button>
</a>

</div>

<?php } ?>

</div>

    <!-- สรุปราคา -->
    <div class="cart-summary">
        <div class="summary-row">
            <span>ราคารวม</span>
            <span class="summary-price">฿<?php echo $total; ?></span>
        </div>
       <a href="payment.php" class="checkout-btn">ชำระเงิน</a>
    </div>

</main>

</body>
</html>