<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. รับค่าจากฟอร์ม (ชื่อต้องตรงกับ name ใน admin_goods_add.php)
    $pro_name    = $_POST['pro_name'];
    $pro_subinfo = $_POST['pro_subinfo'];
    $pro_price   = $_POST['pro_price'];
    $pro_info    = $_POST['pro_info'];
    $cat_id      = $_POST['cat_id'];

    // 2. Logic รันรหัสสินค้า PROxxx อัตโนมัติ
    $res_id = mysqli_query($conn, "SELECT pro_id FROM tb_product ORDER BY pro_id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($res_id);
    if($row_id) {
        $old_id = substr($row_id['pro_id'], 3); 
        $new_pro_id = "PRO" . str_pad((int)$old_id + 1, 3, "0", STR_PAD_LEFT);
    } else {
        $new_pro_id = "PRO001";
    }

    // 3. จัดการไฟล์รูปภาพ
    $pro_image = $_FILES['pro_image']['name'];
    if($pro_image != "") {
        $ext = pathinfo($pro_image, PATHINFO_EXTENSION);
        $new_image_name = "img_" . time() . "." . $ext; // ตั้งชื่อใหม่กันชื่อซ้ำ
        move_uploaded_file($_FILES['pro_image']['tmp_name'], "images/goods/" . $new_image_name);
    } else {
        $new_image_name = "default.jpg";
    }

    // 4. บันทึกลง tb_product (ฟิลด์ตรงตาม SQL)
    $sql_pro = "INSERT INTO tb_product (pro_id, pro_name, pro_price, pro_info, pro_image, pro_subinfo) 
                VALUES ('$new_pro_id', '$pro_name', '$pro_price', '$pro_info', '$new_image_name', '$pro_subinfo')";

    if (mysqli_query($conn, $sql_pro)) {
        // 5. บันทึกลง tb_tag เพื่อเชื่อมหมวดหมู่
        $sql_tag = "INSERT INTO tb_tag (pro_id, cat_id) VALUES ('$new_pro_id', '$cat_id')";
        mysqli_query($conn, $sql_tag);
        
        echo "<script>alert('เพิ่มสินค้า $pro_name สำเร็จ'); window.location='admin_homepage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>