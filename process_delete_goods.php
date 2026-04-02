<?php
include "connect.php";

// รับค่า id จาก URL (จากปุ่มลบใน admin_detail_template.php)
$pro_id = $_GET['id'];

if ($pro_id != "") {
    // 1. ดึงชื่อไฟล์รูปภาพเดิมมาเก็บไว้ก่อนลบข้อมูลใน DB
    $res_img = mysqli_query($conn, "SELECT pro_image FROM tb_product WHERE pro_id = '$pro_id'");
    $row_img = mysqli_fetch_array($res_img);
    $old_image_name = $row_img['pro_image'];

    // 2. ลบข้อมูลจากตาราง tb_tag ก่อน (เพราะติด Foreign Key)
    mysqli_query($conn, "DELETE FROM tb_tag WHERE pro_id = '$pro_id'");

    // 3. ลบข้อมูลจากตาราง tb_product
    $sql_delete = "DELETE FROM tb_product WHERE pro_id = '$pro_id'";
    
    if (mysqli_query($conn, $sql_delete)) {
        // 4. ถ้าลบข้อมูลสำเร็จ ให้ลบไฟล์รูปภาพในโฟลเดอร์ด้วย (ถ้าไม่ใช่รูป default)
        if ($old_image_name != "" && $old_image_name != "default.jpg") {
            $file_path = "images/goods/" . $old_image_name;
            if (file_exists($file_path)) {
                unlink($file_path); // คำสั่งลบไฟล์ออกจากเครื่อง
            }
        }
        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location='admin_homepage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>