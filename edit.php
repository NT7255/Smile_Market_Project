<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "tab-above-user2.php"; ?> <!-- แทบบน อย่าแก้ By เติ้ง --> <!--โหลดไฟล์ tab-above-user2.php ด้วย-->
    หน้าแก้ไขและลบข้อมูลสินค้า
    <main class="profile-container">

        <h2 class="profile-title">แก้ไขข้อมูลโปรไฟล์ของคุณ</h2>

        <!-- รูปโปรไฟล์ -->
        <div class="profile-avatar">
            <img src="profile.jpg" alt=".  . .profile">
            <button class="edit-avatar">✎</button>
        </div>

        <form class="profile-form">

            <!-- ชื่อ - นามสกุล -->
            <div class="row">
                <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" placeholder="ชื่อของคุณ">
                </div>

                <div class="form-group">
                    <label>นามสกุล</label>
                    <input type="text" placeholder="นามสกุลของคุณ">
                </div>
            </div>

            <!-- เบอร์ - วันเกิด -->
            <div class="row">
                <div class="form-group">
                    <label>เบอร์โทร</label>
                    <input type="text" placeholder="เบอร์โทรของคุณ">
                </div>

                <div class="form-group">
                    <label>วันเกิด (ค.ศ.)</label>
                    <input type="date" placeholder="ด-ว-ป">
                </div>
            </div>

            <!-- เพศ / สถานะ -->
            <div class="row">
                <div class="form-group">
                    <label>เพศ</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" checked> ชาย</label>
                        <label><input type="radio" name="gender"> หญิง</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>สถานะ</label>
                    <div class="radio-group">
                        <label><input type="radio" name="status" checked> โสด</label>
                        <label><input type="radio" name="status"> มีคู่สมรส</label>
                        <label><input type="radio" name="status"> แยกกันอยู่</label>
                    </div>
                </div>
            </div>

            <!-- ที่อยู่ -->
            <div class="form-group">
                <label>ที่อยู่ปัจจุบัน</label>
                <textarea rows="3">

                </textarea>
            </div>

            <!-- อีเมล -->
            <div class="form-group">
                <label>อีเมล</label>
                <input type="email" placeholder="......@example.com">
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

            <!-- ปุ่ม -->
            <div class="action-buttons">
                <button type="button" class="cancel-btn">ยกเลิก</button>
                <button type="submit" class="confirm-btn">บันทึก</button>
            </div>

        </form>
    </main>

</body>
</html>