<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_name = $_POST['p_name'];
    $p_short = $_POST['p_short_info'];  // เก็บลงคอลัมน์รายละเอียดเบื้องต้น
    $p_full = $_POST['p_detail_full'];   // เก็บลงคอลัมน์รายละเอียดเต็ม
    $p_price = $_POST['p_price'];
    $cat_id = $_POST['p_category'];
    
    // 1. รันรหัสสินค้าใหม่
    $res_id = mysqli_query($conn, "SELECT pro_id FROM tb_product ORDER BY pro_id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($res_id);
    $new_pro_id = $row_id ? "PRO" . str_pad(substr($row_id['pro_id'], 3) + 1, 3, "0", STR_PAD_LEFT) : "PRO001";

    // 2. จัดการรูปภาพ
    $ext = pathinfo($_FILES['p_img']['name'], PATHINFO_EXTENSION);
    $img_name = $new_pro_id . "_" . time() . "." . $ext;
    move_uploaded_file($_FILES['p_img']['tmp_name'], "images/goods/" . $img_name);

    // 3. บันทึกลงฐานข้อมูล (ใช้ p_short_info และ p_detail_full ตามที่คุณต้องการ)
    // หมายเหตุ: ปรับชื่อคอลัมน์ให้ตรงกับตารางของคุณ (ในที่นี้อิงจาก tb_product)
    $sql = "INSERT INTO tb_product (pro_id, pro_name, pro_price, pro_info, pro_image) 
            VALUES ('$new_pro_id', '$p_name', '$p_price', '$p_full', '$img_name')";
    
    if (mysqli_query($conn, $sql)) {
        // บันทึกความสัมพันธ์ใน tb_tag
        mysqli_query($conn, "INSERT INTO tb_tag (pro_id, cat_id) VALUES ('$new_pro_id', '$cat_id')");

        // 4. [สำคัญ] รันสร้างไฟล์รายละเอียดสินค้าใหม่แบบ Dynamic
        $new_file = "detail_" . $new_pro_id . ".php";
        $content = '<?php $pro_id = "' . $new_pro_id . '"; include "detail_template.php"; ?>';
        file_put_contents($new_file, $content);

        echo "<script>alert('เพิ่มสินค้าสำเร็จ! สร้างหน้าละเอียดเรียบร้อย'); window.location='homepage.php';</script>";
    }
}
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
                <input type="text" name="p_name" placeholder="ระบุชื่อสินค้า เช่น เนื้อวากิว A5" required>
            </div>

            <div class="form-group">
                <label>รายละเอียดย่อย (pro_subinfo)</label>
                <input type="text" name="p_subinfo" placeholder="เช่น เนื้อสด หนุ่ม และอร่อย" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>ราคา (บาท)</label>
                    <input type="number" name="p_price" placeholder="0.00" required>
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                    <select name="p_category">
                        <?php
                        include "connect.php";
                        $sql = "SELECT * FROM tb_category";
                        $res = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($res)) {
                            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>รายละเอียดสินค้า (แบบยาว)</label>
                <textarea name="p_detail" rows="4" placeholder="ระบุสรรพคุณสินค้า..."></textarea>
            </div>

            <div class="form-group">
                <label>รูปภาพสินค้า</label>
                <input type="file" name="p_img" accept="image/*" class="file-input">
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
