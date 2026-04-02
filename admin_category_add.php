<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_name = $_POST['cat_name'];

    // 1. Logic รันรหัสประเภทสินค้าใหม่ (CATxxx)
    $sql_last = "SELECT cat_id FROM tb_category ORDER BY cat_id DESC LIMIT 1";
    $res_last = mysqli_query($conn, $sql_last);
    $row_last = mysqli_fetch_array($res_last);
    
    if ($row_last) {
        $old_id = substr($row_last['cat_id'], 3); 
        $new_cat_id = "CAT" . str_pad((int)$old_id + 1, 3, "0", STR_PAD_LEFT);
    } else {
        $new_cat_id = "CAT001";
    }

    // 2. บันทึกลงฐานข้อมูล
    $sql_insert = "INSERT INTO tb_category (cat_id, cat_name) VALUES ('$new_cat_id', '$cat_name')";
    
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('เพิ่มประเภทสินค้า $cat_name สำเร็จ!'); window.location='admin_homepage.php';</script>";
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

        <form class="container" method="POST" action="">
            <input type="text" name="cat_name" placeholder="ระบุชื่อประเภท เช่น ของทานเล่น" required>
            <button class="big-button-or2" type="submit">บันทึกหมวดหมู่</button>
        </form>
    </div>
</body>
</html>
