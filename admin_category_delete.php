<?php
include "connect.php";
$cat_id = $_GET['cat_id'];

// 1. หา pro_id ทั้งหมดที่อยู่ในหมวดนี้เพื่อลบตัวสินค้าใน tb_product
$sql_pro = "DELETE FROM tb_product WHERE pro_id IN (SELECT pro_id FROM tb_tag WHERE cat_id = '$cat_id')";
mysqli_query($conn, $sql_pro);

// 2. ลบความสัมพันธ์ใน tb_tag
mysqli_query($conn, "DELETE FROM tb_tag WHERE cat_id = '$cat_id'");

// 3. ลบประเภทสินค้า
mysqli_query($conn, "DELETE FROM tb_category WHERE cat_id = '$cat_id'");

header("Location: admin_category_edit.php");
?>