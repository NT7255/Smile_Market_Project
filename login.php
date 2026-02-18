<?php
session_start();
include "connect.php";

// ✅ ถ้าล็อกอินแล้ว → เด้งไปหน้า index
if (isset($_SESSION['member_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {

    $email = $_POST['member_email'];
    $password = $_POST['member_password'];

    $sql = "SELECT * FROM member WHERE member_email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['member_password'])) {

        $_SESSION['member_id'] = $user['member_id'];

        header("Location: index.php");   // ✅ ไปหน้าแรก
        exit();

    } else {
        echo "Email หรือ Password ไม่ถูกต้อง";
    }
}
?>
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
                <label>ชื่ออีเมล์ หรือเบอร์โทรของคุณ</label>
                <input type="text" name="email" placeholder="teemarot@email.com" class="forms">

                <label>รหัสผ่าน</label>
                <input type="password" name="password" placeholder="********" class="forms">

                <a href="repassword.php" class="forgot">ลืมรหัสผ่าน</a>

                <button type="submit" class="login-btn" name="login">เข้าสู่ระบบ</button>

                <p class="register">
                    หากยังไม่มีบัญชี คลิก <a href="register.php">สร้างบัญชี</a>
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