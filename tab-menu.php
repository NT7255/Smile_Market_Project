<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "connect.php"; 

$m_id = "";
$m_name = "";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    // เปลี่ยนชื่อตารางเป็น tb_member ตามฐานข้อมูลหลัก
    $sql = "SELECT member_id, firstname, lastname FROM tb_member WHERE email = '$email'";
    $res_user = mysqli_query($conn, $sql);
    
    if ($res_user && mysqli_num_rows($res_user) > 0) {
        $row_user = mysqli_fetch_assoc($res_user);
        $m_id = $row_user['member_id'];
        $m_name = $row_user['firstname'] . " " . $row_user['lastname'];
    }
}
?>
<div id="sideMenuOverlay" class="menu-overlay" onclick="closeMenu()">
    <div class="side-menu-container" onclick="event.stopPropagation()">
        <div class="profile-section" style="padding: 25px 20px; border-bottom: 1px solid #eee;">
            <?php if($m_id != ""): ?>
                <p style="margin: 0; color: #888; font-size: 13px;">ID: <?php echo $m_id; ?></p>
                <h3 style="margin: 5px 0 0 0; color: #333; font-size: 20px; font-weight: bold;"><?php echo $m_name; ?></h3>
            <?php else: ?>
                <p style="margin: 0; color: #ff9800; font-size: 14px;">กรุณาเข้าสู่ระบบ</p>
            <?php endif; ?>
        </div>
        <div class="divider-line"></div>
        <div class="options-group">
            <a href="edit.php" class="option-btn">แก้ไขข้อมูลส่วนตัว</a>
            <a href="contact.php" class="option-btn">ช่องทางการติดต่อ</a>
        </div>
        <div class="bottom-section">
            <a href="javascript:void(0)" class="logout-full-btn" onclick="openLogoutConfirm()">
                <span>ออกจากระบบ</span>
            </a>
        </div>
    </div>
</div>