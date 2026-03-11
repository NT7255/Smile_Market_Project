<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ตรวจสอบว่าเป็นแอดมินหรือผู้ใช้ เพื่อกำหนดปลายทาง
if (isset($_SESSION['admin_status']) && $_SESSION['admin_status'] === "logged_in") {
    $target_file = "logout_admin_action.php"; // ไปหน้า login แอดมิน
    $back_link = "admin_homepage.php";       // กดยกเลิกกลับหน้าจัดการสินค้า
} else {
    $target_file = "logout_user_action.php";  // ไปหน้า login ผู้ใช้
    $back_link = "homepage.php";            // กดยกเลิกกลับหน้าหลักร้านค้า
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="logout.css">
</head>
<body style="margin:0; background:transparent;">
    <div class="logout-screen-overlay">
        <div class="windowns">
            <div class="in-windowns">
                <div class="content-for-windowns">คุณแน่ใจว่าจะออกจากระบบ ?</div>
                <div class="double-buttons">
                    <a href="<?php echo $target_file; ?>">
                        <button class="green-bt">ตกลง</button>
                    </a>
                    <a href="<?php echo $back_link; ?>">
                        <button class="red-bt">ยกเลิก</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>