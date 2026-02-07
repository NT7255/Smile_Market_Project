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
        <form>
            <div class="zones">
                <div class="form-zone">
                    <label for=""><b class="mg-left-8px">ชื่อ</b></label>
                    <input class="gen-form"></input>
                </div>
                <div class="form-zone">
                    <label for=""><b>นามสกุล</b></label>
                    <input class="gen-form"></input>
                </div>
            </div>
            <div class="zones">
                <div class="form-zone2">
                    <div class="sub-form-zone">
                        <label for=""><b>เบอร์โทร</b></label>
                        <input class="small-2-forms"></input>
                    </div>
                    <div class="sub-form-zone">
                        <label for=""><b>วันเกิด &#40;ค.ศ.&#41;</b></label>
                        <input class="small-2-forms"></input>
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
                    <input class="gen-form2"></input>
                </div>
                <div class="form-zone">
                    <label for=""><b>อีเมล</b></label>
                    <input class="gen-form"></input>
                </div>
            </div>
            <div class="zones">
                <div class="form-zone">
                    <label for=""><b>รหัสผ่าน</b></label>
                    <input class="gen-form"></input>
                </div>
                <div class="form-zone">
                    <label for=""><b>ยืยยันรหัสผ่าน</b></label>
                    <input class="gen-form"></input>
                </div>
            </div>
        </form>
        <div class="double-buttons">
            <button class="red-bt"><b>ตกลง</b></button>
            <button class="green-bt"><b>ยกเลิก</b></button>
        </div>
    </div>
</body>
</html>