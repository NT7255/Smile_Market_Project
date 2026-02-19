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
                <input type="text" name="c_name" placeholder="เช่น เครื่องดื่ม, ของแห้ง" required>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn-save">บันทึกหมวดหมู่</button>
                <button type="button" onclick="history.back()" class="btn-save">กลับ</button>
            </div>
        </form>
    </div>
</body>
</html>
