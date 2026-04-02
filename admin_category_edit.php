<?php 
// 1. ดึงไฟล์เชื่อมต่อฐานข้อมูลมาใช้งานก่อนเป็นอันดับแรก
include "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการประเภทสินค้า - Admin</title>
    <link rel="stylesheet" href="admin_category_edit.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>
    <div class="main_size compact-size">
        <div class="header-content">
            <h1>🛠️ จัดการประเภทสินค้า</h1>
        </div>
        <div class="line"></div>
        <div class="category-list">
            <?php
            // 2. เมื่อเรียกใช้ $conn ตรงนี้ เครื่องจะรู้จักแล้วเพราะเรา include มาจากด้านบน
            $res_cat = mysqli_query($conn, "SELECT * FROM tb_category");
            
            if ($res_cat) {
                while($row_cat = mysqli_fetch_array($res_cat)) {
                ?>
                <div class="category-item">
                    <span><?php echo $row_cat['cat_name']; ?></span>
                    <div class="actions">
                        <a href="admin_category_edit_form.php?cat_id=<?php echo $row_cat['cat_id']; ?>">
                            <button class="btn-edit-sm">แก้ไข</button>
                        </a>
                        <a href="admin_category_delete.php?cat_id=<?php echo $row_cat['cat_id']; ?>" onclick="return confirm('ยืนยันการลบ?')">
                            <button class="btn-del-sm">ลบ</button>
                        </a>
                    </div>
                </div>
                <?php 
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
