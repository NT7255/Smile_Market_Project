<?php
$conn = mysqli_connect("localhost", "root", "", "db_smilemarket");

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . mysqli_connect_error());
}
?>