<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_id = $_POST['old_pro_id'];
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_info = $_POST['pro_info'];
    $pro_unit = $_POST['pro_unit'];

    
    $sql = "UPDATE tb_product SET 
            pro_id = '$pro_id', 
            pro_name = '$pro_name', 
            pro_price = '$pro_price',
            pro_unit = '$pro_unit',
            pro_info = '$pro_info'
            WHERE pro_id = '$old_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('อัปเดตเรียบร้อย!'); window.location='admin_goods_edit.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>