<?php
include "connect.php"; // ไฟล์นี้ต้องมีนะเพื่อน!

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า (เหมือน req.body)
    $pro_id      = $_POST['pro_id'];
    $pro_name    = $_POST['pro_name'];
    $pro_price   = $_POST['pro_price'];
    $pro_info    = $_POST['pro_info'];
    $pro_unit    = $_POST['pro_unit'];
    $pro_subinfo = $_POST['pro_subinfo'];
    $cat_show    = $_POST['cat_show'];
    $pro_exdate  = $_POST['pro_exdate'];

    // จัดการรูปภาพ
    $image_name = $_FILES['pro_image']['name'];
    $tmp_name   = $_FILES['pro_image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);

    // ยิง Query (SQL ดิบๆ เลย)
    $sql = "INSERT INTO tb_product (pro_id, pro_name, pro_price, pro_info, pro_image, cat_show, pro_unit, pro_subinfo, pro_exdate) 
            VALUES ('$pro_id', '$pro_name', '$pro_price', '$pro_info', '$image_name', '$cat_show', '$pro_unit', '$pro_subinfo', '$pro_exdate')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มสำเร็จ!'); window.location='admin_goods_edit.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>