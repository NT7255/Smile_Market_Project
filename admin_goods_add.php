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
            <div class="form-group">
                <label>ชื่อสินค้า</label>
                <input type="text" name="p_name" placeholder="ระบุชื่อสินค้า เช่น เนื้อวากิว A5" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>ราคา (บาท)</label>
                    <input type="number" name="p_price" placeholder="0.00" required>
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                    <select name="p_category">
                        <option value="1">อาหารสด</option>
                        <option value="2">อาหารทะเล</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>รายละเอียดสินค้า</label>
                <textarea name="p_detail" rows="4" placeholder="ระบุสรรพคุณสินค้า..."></textarea>
            </div>

            <div class="form-group">
                <label>รูปภาพสินค้า</label>
                <input type="file" name="p_img" accept="image/*" class="file-input">
            </div>

            <div class="line"></div>
            
            <div class="button-group">
                <button type="submit" class="btn-save">บันทึกข้อมูลสินค้า</button>
                <button type="reset" class="btn-cancel">ยกเลิก</button>
            </div>
        </form>
    </div>
</body>
</html>
