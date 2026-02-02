<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="repassword.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-user1.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user1.php ด้วย-->
    <main class="forgot-container">
    <h2 class="forgot-title">กรอกเพื่อเปลี่ยนรหัสผ่าน</h2>

    <form class="forgot-form">

        <!-- อีเมล / เบอร์โทร -->
        <div class="form-group">
            <label>อีเมล หรือเบอร์โทรของคุณ</label>
            <input type="text" placeholder="teemarot123@example.com">
        </div>

        <!-- รหัสผ่าน -->
        <div class="row">
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="password" placeholder="********">
            </div>

            <div class="form-group">
                <label>ยืนยันรหัสผ่าน</label>
                <input type="password" placeholder="********">
            </div>
        </div>

        <!-- OTP -->
        <div class="form-group">
            <label>ยืนยันรหัสจาก SMS</label>

            <div class="sms-row">
                <input type="text" placeholder="กรอก">
                <button type="button" class="otp-btn">ขอรหัสจาก SMS</button>
            </div>
        </div>

        <!-- ปุ่ม -->
        <div class="action-buttons">
            <button type="button" class="cancel-btn">ยกเลิก</button>
            <button type="submit" class="confirm-btn">ตกลง</button>
        </div>

    </form>
</main>
</body>
</html>