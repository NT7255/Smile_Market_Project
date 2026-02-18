<?php
session_start();
include "connect.php";

if (isset($_POST['register'])) {

    $email    = trim($_POST['member_email']);
    $password = trim($_POST['member_password']);
    $confirm  = trim($_POST['confirm_password']);

    if (empty($email) || empty($password) || empty($confirm)) {
        echo "กรุณากรอกข้อมูลให้ครบ";
        exit();
    }

    if ($password != $confirm) {
        echo "รหัสผ่านไม่ตรงกัน";
        exit();
    }

    // ✅ สร้าง member_id อัตโนมัติ
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_member");
    $row = mysqli_fetch_assoc($result);
    $newNumber = $row['total'] + 1;

    $member_id = "MB" . str_pad($newNumber, 5, "0", STR_PAD_LEFT);

    // hash password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_member (
                member_id,
                member_email,
                member_password
            ) VALUES (
                '$member_id',
                '$email',
                '$hash'
            )";

        if (mysqli_query($conn, $sql)) {

        // ✅ เด้งกลับหน้า Login
        header("Location: login.php");
        exit();

    } else {
        echo "Email นี้ถูกใช้แล้ว";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="yellow_bg.css">
</head>
<body class="yellow_bg">
    <?php include "tab-above-user1.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user1.php ด้วย-->   
    <div class="main_size2">
        <div class="start-heading">กรอกลงทะเบียนเพื่อสร้างบัญชีของคุณ</div>
        <form method="post">
            <div class="zones">
                <div class="form-zone">
                    <label for=""><b class="mg-left-8px">ชื่อ</b></label>
                    <input class="gen-form">
                </div>
                <div class="form-zone">
                    <label for=""><b>นามสกุล</b></label>
                    <input class="gen-form ">
                </div>
            </div>
            <div class="zones">
                <div class="form-zone2">
                    <div class="sub-form-zone">
                        <label for=""><b>เบอร์โทร</b></label>
                        <input class="small-2-forms">
                    </div>
                    <div class="sub-form-zone">
                        <label for=""><b>วันเกิด &#40;ค.ศ.&#41;</b></label>
                        <input class="small-2-forms">
                    </div>
                </div>
                <div class="form-zone2">
                    <div class="sub-form-zone2">
                        <div class="radio-zone"><b>เพศ :&nbsp;</b></div>
                        <div class="radio-group">
                            <div><label><input type="radio" name="sex" checked> ชาย</label></div>
                            <div><label><input type="radio" name="sex"> หญิง</label></div>
                        </div>
                    </div>
                    <div class="sub-form-zone2">
                        <div class="radio-zone2"><b>สถานะ :&nbsp;</b></div>
                        <div class="radio-group">
                            <div><label><input type="radio" name="status" checked> โสด</label></div>
                            <div><label><input type="radio" name="status"> มีคู่สมรส</label></div>
                            <div><label><input type="radio" name="status"> แยกกันอยู่</label></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zones">
                <div class="form-zone">
                    <label for=""><b>เบอร์โทร</b></label>
                    <input class="gen-form2">
                </div>
                <div class="form-zone">
                    <label ><b>ชื่ออีเมลล์</b></label>
                    <input type="text" class="gen-form" name="member_email" required>
                </div>
            </div>
            <div class="zones">
                <div class="form-zone">
                    <label><b>รหัสผ่าน</b></label>
                    <input type="password" class="gen-form" name="member_password" required>
                </div>
                <div class="form-zone">
                    <label><b>ยืยยันรหัสผ่าน</b></label>
                    <input type="password" class="gen-form" name="confirm_password" required>
                </div>
            </div>
            <div class="double-buttons">
                <button class="green-bt" type="submit" name="register"><b>ตกลง</b></button>
                <button type="button" class="red-bt" onclick="window.location.href='login.php'"><b>ยกเลิก</b></button>
            </div>
        </form>
        
    </div>
</body>
</html>