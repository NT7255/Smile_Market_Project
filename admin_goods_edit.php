<?php
include "connect.php"; // เชื่อมต่อ DB

// ดึงข้อมูลสินค้าทั้งหมดจากตาราง tb_product
$sql = "SELECT * FROM tb_product";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า - Admin</title>
    <link rel="stylesheet" href="admin_goods_edit.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-admin.php"; ?>

    <div class="main_size">
        <div class="header-content">
            <h1>🛠️ แก้ไขและลบข้อมูลสินค้า</h1>
            <p>เลือกรายการสินค้าที่ต้องการเปลี่ยนแปลงหรือนำออกจากระบบ</p>
        </div>
        <div class="line"></div>

        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>รูป</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>ประเภท</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // วนลูปพ่นข้อมูลจาก Database ออกมาทีละแถว
                    while($row = mysqli_fetch_assoc($query)) { 
                    ?>
                    <tr>
                        <td>
                            <?php if(!empty($row['pro_image'])) { ?>
                                <img src="images/<?php echo $row['pro_image']; ?>" class="img-thumb">
                            <?php } else { ?>
                                <img src="images/no-image.jpg" class="img-thumb">
                            <?php } ?>
                        </td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td>฿<?php echo number_format($row['pro_price'], 2); ?></td>
                        <td>
                            <?php 
                                // เช็คค่า cat_show เพื่อแสดงชื่อประเภท
                                if($row['cat_show'] == '1') echo "อาหารสด";
                                elseif($row['cat_show'] == '2') echo "อาหารทะเล";
                                else echo "ทั่วไป"; 
                            ?>
                        </td>
                        <td>
                            <a href="admin_goods_form_edit.php?id=<?php echo $row['pro_id']; ?>" 
                               class="btn-edit-sm" style="text-decoration: none; background-color: #ff9800; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px; display: inline-block;">แก้ไข</a>
                            
                            <a href="process_delete_goods.php?id=<?php echo $row['pro_id']; ?>" 
                               class="btn-del-sm" 
                               style="text-decoration: none; background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px; display: inline-block;" 
                               onclick="return confirm('แน่ใจนะว่าจะลบสินค้า [<?php echo $row['pro_name']; ?>] ?');">ลบ</a>
                        </td>
                    </tr>
                    <?php } // ปิด loop ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

