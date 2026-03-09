เพื่อให้ระบบรถเข็นในไฟล์ cart.php สามารถคลิกปุ่ม + และ - เพื่อปรับจำนวนสินค้าได้จริงตามที่คุณต้องการ คุณต้องแก้ไขไฟล์ cart_action.php ให้รองรับคำสั่ง (Action) ต่างๆ และปรับการส่งค่าในไฟล์ cart.php เล็กน้อยครับ

1. แก้ไขไฟล์ cart_action.php (ตัวประมวลผล)
ไฟล์นี้จะทำหน้าที่รับค่า act ว่าจะให้ "เพิ่ม", "ลด" หรือ "ลบ" สินค้าออกจาก Session ครับ

PHP
<?php
session_start();

if (isset($_GET['pro_id'])) {
    $p_id = $_GET['pro_id'];
    $act = isset($_GET['act']) ? $_GET['act'] : 'add';

    // ตรวจสอบว่ามีตะกร้าสินค้าหรือยัง
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    switch ($act) {
        case 'add':
            // เพิ่มจำนวนขึ้น 1
            if (isset($_SESSION['cart'][$p_id])) {
                $_SESSION['cart'][$p_id]++;
            } else {
                $_SESSION['cart'][$p_id] = 1;
            }
            break;

        case 'remove_one':
            // ลดจำนวนลง 1 (ถ้าเหลือ 1 แล้วลดอีก จะลบทิ้ง)
            if (isset($_SESSION['cart'][$p_id])) {
                $_SESSION['cart'][$p_id]--;
                if ($_SESSION['cart'][$p_id] <= 0) {
                    unset($_SESSION['cart'][$p_id]);
                }
            }
            break;

        case 'delete':
            // ลบสินค้านั้นออกจากตะกร้าทันที
            if (isset($_SESSION['cart'][$p_id])) {
                unset($_SESSION['cart'][$p_id]);
            }
            break;
    }

    // เมื่อประมวลผลเสร็จ ให้กลับไปหน้าตะกร้าสินค้า
    header("Location: cart.php");
    exit();
}
?>