<?php
include "connect.php";
$pro_id = $_GET['id'];
$sql = "SELECT * FROM tb_product WHERE pro_id = '$pro_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า</title>
    <link rel="stylesheet" href="admin_goods_add.css"> <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>
    <div class="main_size">
        <h1>🛠️ แก้ไขข้อมูลสินค้า: <?php echo $row['pro_name']; ?></h1>
        <form action="process_update_goods.php" method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="old_pro_id" value="<?php echo $row['pro_id']; ?>">

            <div class="form-row">
                <div class="form-group">
                    <label>รหัสสินค้า</label>
                    <input type="text" name="pro_id" value="<?php echo $row['pro_id']; ?>" required>
                </div>
                <div class="form-group">
                    <label>ชื่อสินค้า</label>
                    <input type="text" name="pro_name" value="<?php echo $row['pro_name']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>ราคา</label>
                    <input type="number" step="0.01" name="pro_price" value="<?php echo $row['pro_price']; ?>" required>
                </div>
                <div class="form-group">
                    <label>หน่วยนับ</label>
                    <input type="text" name="pro_unit" value="<?php echo $row['pro_unit']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label>รายละเอียด</label>
                <textarea name="pro_info" rows="3"><?php echo $row['pro_info']; ?></textarea>
            </div>

            <button type="submit" class="btn-save">อัปเดตข้อมูล</button>
            <a href="admin_goods_edit.php" class="btn-cancel" style="text-decoration:none;">ยกเลิก</a>
        </form>
    </div>
</body>
</html>