<?php
session_start();
include "connect.php";

$message = "";
$message_type = ""; // success หรือ error

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $message = "รหัสผ่านไม่ตรงกัน";
        $message_type = "error";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE tb_users SET password='$hashed_password' WHERE email='$email'");

            $message = "เปลี่ยนรหัสผ่านสำเร็จ";
            $message_type = "success";

        } else {
            $message = "ไม่พบอีเมลในระบบ";
            $message_type = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repassword</title>
    <link rel="stylesheet" href="repassword.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<main class="forgot-container">
    <h2 class="forgot-title">กรอกเพื่อเปลี่ยนรหัสผ่าน</h2>

    <!-- แสดงเมื่อสำเร็จ -->
    <?php if($message_type == "success") { ?>

    <div class="success-box">
        <div class="success-title">
            เปลี่ยนรหัสผ่านสำเร็จ 🎉
        </div>

        <div class="info-box">
            กรุณาเข้าสู่ระบบด้วยรหัสผ่านใหม่ของคุณ
        </div>

        <div class="action-buttons" style="justify-content:center;">
            <a href="login.php" class="go-login-btn">
                ไปหน้าเข้าสู่ระบบ
            </a>
        </div>
    </div>

<?php } ?>

    <!-- แสดงฟอร์มเมื่อยังไม่สำเร็จ -->
    <?php if($message_type != "success") { ?>

        <?php if($message != "") { ?>
            <p class="<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </p>
        <?php } ?>

        <form class="forgot-form" method="POST">

            <div class="form-group">
                <label>อีเมลของคุณ</label>
                <input type="text" name="email" required>
            </div>

            <div class="row">
                <div class="form-group">
                    <label>รหัสผ่านใหม่</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label>ยืนยันรหัสผ่าน</label>
                    <input type="password" name="confirm_password" required>
                </div>
            </div>

            <div class="action-buttons">
                <a href="login.php">
                    <button type="button" class="cancel-btn">ยกเลิก</button>
                </a>

                <button type="submit" class="confirm-btn">ตกลง</button>
            </div>

        </form>

    <?php } ?>

</main>

</body>
</html>