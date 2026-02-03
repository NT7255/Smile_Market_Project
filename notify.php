<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="notify.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-user2.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user2.php ด้วย-->
    <main class="notification-page">

    <h2 class="page-title">การแจ้งเตือน</h2>

    <div class="notification-list">

        <!-- รายการแจ้งเตือน -->
        <div class="notification-item">
            <div class="notification-text">
                <p class="title">คำสั่งซื้อของคุณจัดส่งแล้ว</p>
                <p class="detail">
                    คำสั่งซื้อ TH00000031 สามารถติดตามรายละเอียดสินค้าผ่านการสั่งซื้อ
                    คลิกปุ่ม "เปิดอ่าน" ได้เลย
                </p>
                <span class="time">10-11-2025 18:55:23</span>
            </div>

            <button class="read-btn">เปิดอ่าน</button>
        </div>

        <div class="notification-item">
            <div class="notification-text">
                <p class="title">คำสั่งซื้อของคุณจัดส่งแล้ว</p>
                <p class="detail">
                    คำสั่งซื้อ TH00000013 สามารถติดตามรายละเอียดสินค้าผ่านการสั่งซื้อ
                    คลิกปุ่ม "เปิดอ่าน" ได้เลย
                </p>
                <span class="time">23/10/2025 12:35:02</span>
            </div>

            <button class="read-btn">เปิดอ่าน</button>
        </div>

    </div>

    </main>

</body>
</html>