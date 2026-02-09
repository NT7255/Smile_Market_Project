<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-user1.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user1.php ด้วย-->
<div class="container">
    <!-- ฝั่งซ้าย -->
    <div class="login-section">
        <div class="login-content">
            <img src="images/smile-market-logo-cutouted.PNG" alt="Smile Market Logo"class="logo">

            <h3>กรอกเพื่อเข้าสู่ระบบ</h3>

            <form>
                <label>อีเมล หรือเบอร์โทรของคุณ</label>
                <input type="text" placeholder="teemarot@email.com" class="forms">

                <label>รหัสผ่าน</label>
                <input type="password" placeholder="********" class="forms">

                <a href="repassword.php" class="forgot">ลืมรหัสผ่าน</a>

                <button type="submit" class="login-btn">เข้าสู่ระบบ</button>

                <p class="register">
                    หากยังไม่มีบัญชี คลิก <a href="#">สร้างบัญชี</a>
                </p>
            </form>
        </div>
    </div>

    <!-- ฝั่งขวา -->
    <div class="image-section">
        <img src="images/shopping.png" alt="shopping">
    </div>

</div>

</body>
</html>