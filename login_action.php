<?php
session_start();
include "connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM tb_member WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['member_id'] = $row['member_id'];
        header("Location: homepage.php");
    } else {
        echo "<script>alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง'); window.history.back();</script>";
    }
}
?>