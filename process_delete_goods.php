<?php
include "connect.php";

if(isset($_GET['id'])) {
    $pro_id = $_GET['id'];
    
    // ยิง Query ลบ
    $sql = "DELETE FROM tb_product WHERE pro_id = '$pro_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location='admin_goods_edit.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>