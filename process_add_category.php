PHP
<?php
include "connect.php";
$cat_name = $_POST['cat_name'];

// รัน ID: CATxxx
$res = mysqli_query($conn, "SELECT cat_id FROM tb_category ORDER BY cat_id DESC LIMIT 1");
$row = mysqli_fetch_array($res);
$new_cat_id = $row ? "CAT" . str_pad(substr($row['cat_id'], 3) + 1, 3, "0", STR_PAD_LEFT) : "CAT001";

$sql = "INSERT INTO tb_category (cat_id, cat_name) VALUES ('$new_cat_id', '$cat_name')";
if(mysqli_query($conn, $sql)) {
    echo "<script>alert('เพิ่มประเภทสำเร็จ'); window.location='admin_homepage.php';</script>";
}
?>