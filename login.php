<?php
session_start();
include "connect.php";

$error = "";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT * FROM users WHERE email='$email' OR phone='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    // เช็ครหัสผ่านแบบ hash
    if (password_verify($password, $row['password'])) {

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_name'] = $row['firstname'];

        header("Location: index.php");
        exit();

    } else {
        $error = "รหัสผ่านไม่ถูกต้อง";
    }

} else {
    $error = "ไม่พบผู้ใช้นี้ในระบบ";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<!-- <?php // include "tab-above-user1.php"; ?> -->

<div class="container">

    <div class="login-section">
        <div class="login-content">
            <img src="images/smile-market-logo.PNG" alt="Smile Market Logo" class="logo">

            <h3>กรอกเพื่อเข้าสู่ระบบ</h3>

            <?php if($error != "") { ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php } ?>

            <form method="POST">

                <label>อีเมล หรือเบอร์โทรของคุณ</label>
                <input type="text" name="email" required placeholder="กรอกอีเมลของคุณ">

                <label>รหัสผ่าน</label>
                <input type="password" name="password" required placeholder="********">

                <a href="repassword.php" class="forgot">ลืมรหัสผ่าน</a>

                <button type="submit" name="login" class="login-btn">เข้าสู่ระบบ</button>

                <p class="register">
                    หากยังไม่มีบัญชี คลิก <a href="register.php">สร้างบัญชี</a>
                </p>

            </form>
        </div>
    </div>

    <div class="image-section">
        <img src="images/shopping.png" alt="shopping">
    </div>

</div>

</body>
</html>