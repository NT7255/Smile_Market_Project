<?php
include "connect.php"; // ไฟล์เชื่อมต่อฐานข้อมูลของคุณ

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_name = $_POST['cat_name'];

    // 1. สร้าง Logic การรัน cat_id (เช่น CAT001) เนื่องจากใน SQL เป็น varchar(20)
    $sql_last = "SELECT cat_id FROM tb_category ORDER BY cat_id DESC LIMIT 1";
    $res_last = mysqli_query($conn, $sql_last);
    $row_last = mysqli_fetch_array($res_last);
    
    if ($row_last) {
        $old_id = substr($row_last['cat_id'], 3); // ตัดคำว่า CAT ออก
        $new_id = "CAT" . str_pad((int)$old_id + 1, 3, "0", STR_PAD_LEFT);
    } else {
        $new_id = "CAT001";
    }

    // 2. บันทึกลงฐานข้อมูล
    $sql_insert = "INSERT INTO tb_category (cat_id, cat_name) VALUES ('$new_id', '$cat_name')";
    
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('เพิ่มประเภทสินค้าเรียบร้อย'); window.location='admin_category_edit.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มประเภทสินค้า</title>
    <link rel="stylesheet" href="admin_category_add.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>

    <div class="main_size">
        <div class="header-content">
            <h1>📂 เพิ่มประเภทสินค้าใหม่</h1>
            <p>สร้างหมวดหมู่ใหม่เพื่อจัดกลุ่มสินค้าในร้าน</p>
        </div>
        <div class="line"></div>

        <form action="process_add_category.php" method="POST" class="admin-form-compact">
            <div class="form-group">
                <label>ชื่อประเภทสินค้า</label>
                <input type="text" name="cat_name" placeholder="เช่น เครื่องดื่ม, ของแห้ง" required>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn-save">บันทึกหมวดหมู่</button>
                <button type="button" onclick="history.back()" class="btn-save">กลับ</button>
            </div>
        </form>
    </div>
</body>
</html>
