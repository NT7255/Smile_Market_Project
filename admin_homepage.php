<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_status']) || $_SESSION['admin_status'] !== "logged_in") {
    header("Location: admin_login.php");
    exit();
}
include "connect.php";

// ดึงข้อมูลสินค้าทั้งหมดเพื่อแสดงในหน้าหลักแอดมิน
$sql = "SELECT * FROM tb_product ORDER BY pro_id DESC";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Smile Market</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="logout.css">
</head>
<body>
    <?php include "tab-above-admin-homepage.php"; ?>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="sidebar-menu">
                <a href="admin_goods_add.php" class="menu-btn">เพิ่มสินค้า</a>
                <a href="admin_goods_manage.php" class="menu-btn">แก้ไข-ลบข้อมูลสินค้า</a> <a href="#" class="menu-btn">เพิ่มประเภทสินค้า</a>
                <a href="#" class="menu-btn">แก้ไข-ลบประเภทสินค้า</a>
            </div>
        </aside>

        <main class="admin-main-content">
            <div class="admin-product-header">
                <h2>รายการสินค้าทั้งหมดในระบบ</h2>
            </div>

            <?php if (mysqli_num_rows($res) > 0): ?>
                <div class="admin-product-grid">
                    <?php while($row = mysqli_fetch_array($res)): ?>
                        <a href="admin_detail_<?php echo $row['pro_id']; ?>.php" class="admin-product-card-link">
                            <div class="admin-product-card">   
                                <div class="admin-product-img">
                                    <img src="images/goods/<?php echo $row['pro_image']; ?>" alt="">
                                </div>
                                <div class="admin-product-info">
                                    <p class="admin-pro-id">ID: <?php echo $row['pro_id']; ?></p>
                                    <h3 class="admin-pro-name"><?php echo $row['pro_name']; ?></h3>
                                    <p class="admin-pro-price">฿<?php echo number_format($row['pro_price'], 2); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <h1>สินค้าว่างเปล่า</h1>
                    <p>กรุณาเพิ่มสินค้าเข้าสู่ระบบ</p>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
