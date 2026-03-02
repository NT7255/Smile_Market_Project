<?php
$host = "localhost";
$user = "root";
$pass = ""; // ปกติ XAMPP รหัสผ่านว่าง
$db   = "test"; // ชื่อฐานข้อมูลตามรูป phpMyAdmin 

$conn = mysqli_connect($host, $user, $pass, $db);

// เช็คว่าเชื่อมติดไหม
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8"); // กันภาษาไทยเป็นภาษาต่างดาว
?>
