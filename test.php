<?php
$conn = mysqli_connect("localhost", "root", "", "db_smilemarket");

if ($conn) {
    echo "เชื่อมต่อสำเร็จ ✅";
} else {
    echo "เชื่อมต่อไม่สำเร็จ ❌";
}
?>