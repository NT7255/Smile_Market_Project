<?php
session_start();
// ลบ session ของผู้ใช้
unset($_SESSION['user_id']);
unset($_SESSION['user_status']); 
// หรือ session_destroy(); 

header("Location: login.php"); // ส่งกลับไปหน้า login ของผู้ใช้
exit();
?>