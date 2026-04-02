<?php
include "connect.php";

// รับ id สินค้าที่ต้องการแก้ไขจาก URL
$pro_id = $_GET['id'];

// ดึงข้อมูลเดิมออกมาโชว์
$sql = "SELECT p.*, t.cat_id FROM tb_product p 
        LEFT JOIN tb_tag t ON p.pro_id = t.pro_id 
        WHERE p.pro_id = '$pro_id'";
$res = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($res);

if(!$item) { echo "ไม่พบข้อมูลสินค้า"; exit; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า - <?php echo $item['pro_name']; ?></title>
    <link rel="stylesheet" href="admin_goods_add.css"> <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>

    <div class="main_size">
        <div class="header-content">
            <h1>📝 แก้ไขข้อมูลสินค้า</h1>
            <p>รหัสสินค้า: <?php echo $item['pro_id']; ?></p>
        </div>
        <div class="line"></div>

        <form action="process_update_goods.php" method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="pro_id" value="<?php echo $item['pro_id']; ?>">

            <div class="form-group">
                <label>ชื่อสินค้า</label>
                <input type="text" name="pro_name" value="<?php echo $item['pro_name']; ?>" required>
            </div>

            <div class="form-group">
                <label>รายละเอียดย่อย (pro_subinfo)</label>
                <input type="text" name="pro_subinfo" value="<?php echo $item['pro_subinfo']; ?>">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>ราคา (บาท)</label>
                    <input type="number" step="0.01" name="pro_price" value="<?php echo $item['pro_price']; ?>" required>
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                    <select name="cat_id" required>
                        <?php
                        $res_cat = mysqli_query($conn, "SELECT * FROM tb_category");
                        while($row_cat = mysqli_fetch_array($res_cat)) {
                            // ถ้า cat_id ตรงกับของเดิม ให้เลือก (selected) ไว้
                            $selected = ($row_cat['cat_id'] == $item['cat_id']) ? "selected" : "";
                            echo "<option value='".$row_cat['cat_id']."' $selected>".$row_cat['cat_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>รายละเอียดสินค้า (แบบยาว)</label>
                <textarea name="pro_info" rows="4"><?php echo $item['pro_info']; ?></textarea>
            </div>

            <div class="form-group">
                <label>รูปภาพสินค้า (ปล่อยว่างหากไม่ต้องการเปลี่ยน)</label>
                <input type="file" name="pro_image" accept="image/*" class="file-input">
                <p style="font-size: 12px; color: #888;">รูปปัจจุบัน: <?php echo $item['pro_image']; ?></p>
            </div>

            <div class="line"></div>
            
            <div class="button-group" style="display: flex; gap: 15px; justify-content: flex-end;">
                <button type="button" onclick="window.history.back();" class="btn-cancel">ยกเลิก</button>
                <button type="submit" class="btn-save">บันทึกการแก้ไข</button>
            </div>
        </form>
    </div>
</body>
</html>