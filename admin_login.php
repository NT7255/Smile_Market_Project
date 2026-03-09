<?php
session_start();

// ตรวจสอบการกดปุ่มเข้าสู่ระบบ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['admin_password'];

    // เงื่อนไขตรวจสอบรหัสผ่าน
    if ($password === "smilemarket123##") {
        $_SESSION['admin_status'] = "logged_in";
        echo "<script>alert('เข้าสู่ระบบแอดมินสำเร็จ'); window.location='admin_homepage.php';</script>";
    } else {
        $error_msg = "รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Smile Market</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin_login.css">
</head>
<body class="admin-login-body">
    <div class="login-container">
        <div class="login-box">
            <div class="logo-section">
                <img src="images/smile-market-logo.PNG" alt="Logo">
                <h2>Admin Control Panel</h2>
                <p>กรุณากรอกรหัสผ่านเพื่อเข้าสู่ระบบจัดการ</p>
            </div>

            <form action="admin_login.php" method="POST" class="login-form">
                <div class="input-group">
                    <label for="admin_password">รหัสผ่านผู้ดูแลระบบ</label>
                    <input type="password" name="admin_password" id="admin_password" placeholder="••••••••" required>
                </div>

                <?php if (isset($error_msg)): ?>
                    <p class="error-text"><?php echo $error_msg; ?></p>
                <?php endif; ?>

                <button type="submit" class="login-btn">เข้าสู่ระบบแอดมิน</button>
            </form>

            <div class="footer-link">
                <a href="homepage.php">กลับสู่หน้าหลักร้านค้า</a>
            </div>
        </div>
    </div>
</body>
</html>