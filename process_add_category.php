<?php
include "connect.php"; // ไฟล์เชื่อมต่อฐานข้อมูลของคุณ

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_name = $_POST['cat_name'];

    // 1. สร้าง Logic การรัน cat_id (เช่น CAT001) เนื่องจากใน SQL เป็น varchar(20)
    $sql_last = "SELECT cat_id FROM tb_category ORDER BY cat_id DESC LIMIT 1";
    $res_last = mysqli_query($conn, $sql_last);
    $row_last = mysqli_fetch_array($res_last);
    
    if ($row_last) {
        $old_id = substr($row_last['cat_id'], 3); // ตัดคำว่า CAT ออก
        $new_id = "CAT" . str_pad((int)$old_id + 1, 3, "0", STR_PAD_LEFT);
    } else {
        $new_id = "CAT001";
    }

    // 2. บันทึกลงฐานข้อมูล
    $sql_insert = "INSERT INTO tb_category (cat_id, cat_name) VALUES ('$new_id', '$cat_name')";
    
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('เพิ่มประเภทสินค้าเรียบร้อย'); window.location='admin_category_edit.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>