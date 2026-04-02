<?php
include "connect.php";
// ไม่ต้องทำ Logic รัน ID ที่นี่ เพราะเราจะไปทำในไฟล์ process เพื่อป้องกัน ID ซ้ำซ้อน
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้าใหม่ - Smile Market</title>
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
            
            <div class="form-group">
                <label>ชื่อสินค้า</label>
                <input type="text" name="pro_name" placeholder="ระบุชื่อสินค้า เช่น เนื้อวากิว A5" required>
            </div>

            <div class="form-group">
                <label>รายละเอียดย่อย (pro_subinfo)</label>
                <input type="text" name="pro_subinfo" placeholder="เช่น เนื้อสด หนุ่ม และอร่อย">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>ราคา (บาท)</label>
                    <input type="number" step="0.01" name="pro_price" placeholder="0.00" required>
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                    <select name="cat_id" required>
                        <option value="">-- เลือกหมวดหมู่ --</option>
                        <?php
                        $res_cat = mysqli_query($conn, "SELECT * FROM tb_category");
                        while($row = mysqli_fetch_array($res_cat)) {
                            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>รายละเอียดสินค้า (แบบยาว)</label>
                <textarea name="pro_info" rows="4" placeholder="ระบุสรรพคุณสินค้า..."></textarea>
            </div>

            <div class="form-group">
                <label>รูปภาพสินค้า</label>
                <input type="file" name="pro_image" accept="image/*" class="file-input" required>
            </div>

            <div class="line"></div>
            
            <div class="button-group" style="display: flex; gap: 15px; justify-content: flex-end;">
                <button type="reset" class="btn-cancel">ยกเลิก</button>
                <button type="submit" class="btn-save">บันทึกข้อมูลสินค้า</button>
            </div>
        </form>
    </div>
</body>
</html>