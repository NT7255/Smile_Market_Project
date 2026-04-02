<?php
session_start();
include "connect.php";

// ตรวจสอบว่าได้ Log in หรือยัง
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$message = "";

// 1. ดึงข้อมูลผู้ใช้มาแสดงในฟอร์มครั้งแรก
$result = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

// ถ้าหา user ไม่เจอ (เช่นโดนลบไปแล้ว) ให้ดีดกลับหน้าแรก
if (!$user) {
    header("Location: homepage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าและป้องกันการแฮก (SQL Injection)
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone     = mysqli_real_escape_string($conn, $_POST['phone']);
    $birthday  = mysqli_real_escape_string($conn, $_POST['birthday']);
    $gender    = mysqli_real_escape_string($conn, $_POST['gender']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);
    $address   = mysqli_real_escape_string($conn, $_POST['address']);
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);

    // 2. อัปเดตข้อมูลลงฐานข้อมูล
    $sql_update = "UPDATE tb_users SET 
        firstname = '$firstname',
        lastname  = '$lastname',
        phone     = '$phone',
        birthday  = '$birthday',
        gender    = '$gender',
        status    = '$status',
        address   = '$address',
        email     = '$new_email'
        WHERE email = '$email'";

    if (mysqli_query($conn, $sql_update)) {
        // อัปเดต Session ถ้ามีการเปลี่ยนอีเมล
        $_SESSION['email'] = $new_email;
        $message = "อัปเดตข้อมูลสำเร็จ ระบบกำลังพากลับหน้าแรก...";
        
        echo "<script>
            setTimeout(function(){
                window.location.href='homepage.php';
            }, 2000);
        </script>";

        // โหลดข้อมูลใหม่หลังจากอัปเดต เพื่อให้ฟอร์มแสดงค่าล่าสุด
        $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$new_email'");
        $user = mysqli_fetch_assoc($result);
    } else {
        $message = "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขโปรไฟล์ - Smile Market</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="edit.css">
</head>
<body>

<main class="profile-container">
    <h2 class="profile-title">แก้ไขข้อมูลโปรไฟล์ของคุณ</h2>

    <?php if($message != "") { ?>
        <p class="success-msg" style="color: green; text-align: center; margin-bottom: 20px;">
            <?php echo $message; ?>
        </p>
    <?php } ?>

    <form method="POST" class="profile-form">
        <div class="form-group">
            <label>ชื่อ</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
        </div>

        <div class="form-group">
            <label>นามสกุล</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
        </div>

        <div class="form-group">
            <label>เบอร์โทร</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
        </div>

        <div class="form-group">
            <label>วันเกิด</label>
            <input type="date" name="birthday" value="<?php echo htmlspecialchars($user['birthday']); ?>">
        </div>

        <div class="form-group">
            <label>เพศ</label>
            <input type="text" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>">
        </div>

        <div class="form-group">
            <label>สถานะ</label>
            <input type="text" name="status" value="<?php echo htmlspecialchars($user['status']); ?>">
        </div>

        <div class="form-group">
            <label>ที่อยู่</label>
            <textarea name="address" rows="3"><?php echo htmlspecialchars($user['address']); ?></textarea>
        </div>

        <div class="form-group">
            <label>อีเมล</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <div class="form-actions" style="display: flex; gap: 10px; margin-top: 20px;">
            <a href="homepage.php" class="btn-cancel" style="flex: 1; text-align: center; text-decoration: none; padding: 10px; background: #ddd; color: #333; border-radius: 5px;">ยกเลิก</a>
            <button type="submit" class="btn-save" style="flex: 1; padding: 10px; background: #ff9800; color: white; border: none; border-radius: 5px; cursor: pointer;">บันทึก</button>
        </div>
    </form>
</main>

</body>
</html>