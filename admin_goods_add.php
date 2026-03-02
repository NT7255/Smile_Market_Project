<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_goods_add.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>

    <div class="main_size">
        <div class="header-content">
            <h1>➕ เพิ่มสินค้าใหม่</h1>
            <p>กรอกรายละเอียดสินค้าเพื่อนำขึ้นระบบ Smile Market</p>
        </div>
        <div class="line"></div>

        <form action="process_add_goods.php" method="POST" enctype="multipart/form-data" class="admin-form">
    <div class="form-row">
        <div class="form-group">
            <label>รหัสสินค้า (pro_id)</label>
            <input type="text" name="pro_id" required>
        </div>
        <div class="form-group">
            <label>ชื่อสินค้า (pro_name)</label>
            <input type="text" name="pro_name" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>ราคา (pro_price)</label>
            <input type="number" step="0.01" name="pro_price" required>
        </div>
        <div class="form-group">
            <label>หน่วยนับ (pro_unit)</label>
            <input type="text" name="pro_unit" placeholder="กิโลกรัม/กล่อง">
        </div>
    </div>
    <div class="form-group">
        <label>ข้อมูลสรุป (pro_subinfo)</label>
        <input type="text" name="pro_subinfo">
    </div>
    <div class="form-group">
        <label>รายละเอียด (pro_info)</label>
        <textarea name="pro_info" rows="3"></textarea>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>หมวดหมู่ (cat_show)</label>
            <select name="cat_show">
                <option value="1">อาหารสด</option>
                <option value="2">อาหารทะเล</option>
            </select>
        </div>
        <div class="form-group">
            <label>วันหมดอายุ (pro_exdate)</label>
            <input type="date" name="pro_exdate">
        </div>
    </div>
    <div class="form-group">
        <label>รูปสินค้า (pro_image)</label>
        <input type="file" name="pro_image">
    </div>
    <button type="submit" class="btn-save">บันทึกสินค้า</button>
</form>
    </div>
</body>
</html>
