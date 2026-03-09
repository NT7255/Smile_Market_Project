<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_smilemarket"; // ชื่อฐานข้อมูลตามไฟล์ SQL ของคุณ

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>