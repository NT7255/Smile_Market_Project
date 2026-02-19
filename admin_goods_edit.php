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
                    <tr>
                        <td><img src="images/product1.jpg" class="img-thumb"></td>
                        <td>เนื้อวากิว A5</td>
                        <td>฿580.00</td>
                        <td>อาหารสด</td>
                        <td>
                            <button class="btn-edit-sm">แก้ไข</button>
                            <button class="btn-del-sm">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
