<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. รับค่าจากฟอร์ม (ชื่อใน $_POST['...'] ต้องตรงกับ name ในหน้า HTML)
    $p_name = $_POST['p_name'];
    $p_subinfo = $_POST['p_subinfo']; // <--- ดึงค่าจาก input ชื่อ p_subinfo
    $p_price = $_POST['p_price'];
    $p_detail = $_POST['p_detail'];
    $cat_id = $_POST['p_category'];

    // 2. จัดการรหัสสินค้าอัตโนมัติ (PROxxx)
    $res_last = mysqli_query($conn, "SELECT pro_id FROM tb_product ORDER BY pro_id DESC LIMIT 1");
    $row_last = mysqli_fetch_array($res_last);
    $new_id = $row_last ? "PRO" . str_pad(substr($row_last['pro_id'], 3) + 1, 3, "0", STR_PAD_LEFT) : "PRO001";

    // 3. จัดการรูปภาพ
    $ext = pathinfo($_FILES['p_img']['name'], PATHINFO_EXTENSION);
    $img_name = $new_id . "_" . time() . "." . $ext;
    move_uploaded_file($_FILES['p_img']['tmp_name'], "images/goods/" . $img_name);

    // 4. คำสั่ง SQL (ต้องมีคอลัมน์ pro_subinfo และชื่อต้องตรงกับใน DB)
    $sql = "INSERT INTO tb_product (pro_id, pro_name, pro_subinfo, pro_price, pro_info, pro_image) 
            VALUES ('$new_id', '$p_name', '$p_subinfo', '$p_price', '$p_detail', '$img_name')";

    // ... (โค้ดส่วนบันทึก SQL เดิมของคุณ) ...

    if (mysqli_query($conn, $sql)) {
        // สร้างไฟล์สำหรับลูกค้า
        $file_customer = "detail_" . $new_id . ".php";
        $content_customer = '<?php $pro_id = "' . $new_id . '"; include "detail_template.php"; ?>';
        file_put_contents($file_customer, $content_customer);

        // สร้างไฟล์สำหรับแอดมิน (เพิ่มตรงนี้!)
        $file_admin = "admin_detail_" . $new_id . ".php";
        $content_admin = '<?php $pro_id = "' . $new_id . '"; include "admin_detail_template.php"; ?>';
        file_put_contents($file_admin, $content_admin);

        echo "<script>alert('บันทึกสินค้าและสร้างไฟล์เรียบร้อย'); window.location='admin_homepage.php';</script>";
    } else {
        // ถ้า Save ไม่ได้ ให้เปิดคำสั่งนี้เพื่อดูว่าผิดตรงไหน
        echo "Error: " . mysqli_error($conn); 
    }
}
?>