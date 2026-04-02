<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pro_id      = $_POST['pro_id'];
    $pro_name    = $_POST['pro_name'];
    $pro_subinfo = $_POST['pro_subinfo'];
    $pro_price   = $_POST['pro_price'];
    $pro_info    = $_POST['pro_info'];
    $cat_id      = $_POST['cat_id'];

    // 1. จัดการเรื่องรูปภาพ
    $file_name = $_FILES['pro_image']['name'];
    if ($file_name != "") {
        // ถ้ามีการอัปโหลดรูปใหม่
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_image_name = "img_" . time() . "." . $ext;
        move_uploaded_file($_FILES['pro_image']['tmp_name'], "images/goods/" . $new_image_name);
        
        // ลบรูปเก่าทิ้ง (เพื่อประหยัดพื้นที่)
        $res_old = mysqli_query($conn, "SELECT pro_image FROM tb_product WHERE pro_id = '$pro_id'");
        $old_data = mysqli_fetch_array($res_old);
        if($old_data['pro_image'] != "default.jpg" && file_exists("images/goods/".$old_data['pro_image'])) {
            unlink("images/goods/".$old_data['pro_image']);
        }

        $sql_img = ", pro_image = '$new_image_name'";
    } else {
        $sql_img = ""; // ไม่เปลี่ยนรูป
    }

    // 2. Update ตาราง tb_product
    $sql_update_pro = "UPDATE tb_product SET 
                       pro_name = '$pro_name', 
                       pro_price = '$pro_price', 
                       pro_info = '$pro_info', 
                       pro_subinfo = '$pro_subinfo' 
                       $sql_img 
                       WHERE pro_id = '$pro_id'";

    if (mysqli_query($conn, $sql_update_pro)) {
        // 3. Update ตาราง tb_tag (หมวดหมู่)
        mysqli_query($conn, "UPDATE tb_tag SET cat_id = '$cat_id' WHERE pro_id = '$pro_id'");
        
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location='admin_homepage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>