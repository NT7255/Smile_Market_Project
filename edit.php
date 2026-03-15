<?php
session_start();
include "connect.php";

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$message = "";

// ดึงข้อมูลผู้ใช้
$result = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $new_email = $_POST['email'];

    mysqli_query($conn, "UPDATE tb_users SET 
        firstname='$firstname',
        lastname='$lastname',
        phone='$phone',
        birthday='$birthday',
        gender='$gender',
        status='$status',
        address='$address',
        email='$new_email'
        WHERE email='$email'
    ");

    $_SESSION['email'] = $new_email;
    $message = "อัปเดตข้อมูลสำเร็จ กำลังกลับหน้าแรก...";

echo "<script>
setTimeout(function(){
    window.location.href='homepage.php';
},2000);
</script>";

    // โหลดข้อมูลใหม่
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$new_email'");
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="edit.css">
</head>
<body>

<main class="profile-container">
    <h2 class="profile-title">แก้ไขข้อมูลโปรไฟล์ของคุณ</h2>

    <?php if($message != "") { ?>
       <p class="success-msg"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" class="profile-form">

        <div class="row">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>">
            </div>

            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label>เบอร์โทร</label>
                <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
            </div>

            <div class="form-group">
                <label>วันเกิด</label>
                <input type="date" name="birthday" value="<?php echo $user['birthday']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>เพศ</label>
            <input type="text" name="gender" value="<?php echo $user['gender']; ?>">
        </div>

        <div class="form-group">
            <label>สถานะ</label>
            <input type="text" name="status" value="<?php echo $user['status']; ?>">
        </div>

        <div class="form-group">
            <label>ที่อยู่</label>
            <textarea name="address"><?php echo $user['address']; ?></textarea>
        </div>

        <div class="form-group">
            <label>อีเมล</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>">
        </div>

        <div class="form-actions">

    <a href="homepage.php" class="btn-cancel">ยกเลิก</a>

    <button type="submit" class="btn-save">บันทึก</button>

     </div>

    </form>
</main>

</body>
</html>