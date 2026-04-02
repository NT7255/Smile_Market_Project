<?php
include "connect.php";
// ส่วนนี้ไม่ต้องรับ $_GET['pro_id'] เพราะหน้าหลักนี้ควรโชว์สินค้า "ทุกตัว" ให้แอดมินเลือก
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า - Admin</title>
    <link rel="stylesheet" href="admin_goods_edit.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>

    <div class="main_size">
        <div class="header-content">
            <h1>🛠️ จัดการข้อมูลสินค้า</h1>
            <p>รายการสินค้าทั้งหมดในระบบ Smile Market</p>
        </div>
        <div class="line"></div>

        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>รูป</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>ประเภท</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // ดึงสินค้าทั้งหมดพร้อมชื่อหมวดหมู่
                    $sql = "SELECT p.*, c.cat_name FROM tb_product p 
                            LEFT JOIN tb_tag t ON p.pro_id = t.pro_id 
                            LEFT JOIN tb_category c ON t.cat_id = c.cat_id 
                            ORDER BY p.pro_id DESC";
                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res) > 0) {
                        while($row = mysqli_fetch_array($res)) {
                    ?>
                    <tr>
                        <td>
                            <img src="images/goods/<?php echo $row['pro_image']; ?>" class="img-thumb" alt="product">
                        </td>
                        <td>
                            <b><?php echo $row['pro_id']; ?></b><br>
                            <?php echo $row['pro_name']; ?>
                        </td>
                        <td>฿<?php echo number_format($row['pro_price'], 2); ?></td>
                        <td><?php echo $row['cat_name'] ? $row['cat_name'] : 'ทั่วไป'; ?></td>
                        <td>
                            <a href="admin_goods_form_edit.php?id=<?php echo $row['pro_id']; ?>" class="btn-edit-sm">แก้ไข</a>
                            
                            <a href="process_delete_goods.php?id=<?php echo $row['pro_id']; ?>" 
                               class="btn-del-sm" 
                               onclick="return confirm('ยืนยันการลบสินค้า [<?php echo $row['pro_name']; ?>] ?');">ลบ</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center;'>ยังไม่มีข้อมูลสินค้า</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>