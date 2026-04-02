<div id="sideMenuOverlay" class="menu-overlay" onclick="closeMenu()">
    <div class="side-menu-container" onclick="event.stopPropagation()">
        <div class="profile-section"> ... </div>
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

<div id="userLogoutModal" class="logout-screen-overlay" style="display: none;">
    <div class="windowns">
        <div class="in-windowns">
            <div class="content-for-windowns">คุณแน่ใจว่าจะออกจากระบบ ?</div>
            <div class="double-buttons">
                <a href="logout_user_action.php"><button class="green-bt">ตกลง</button></a>
                <button class="red-bt" onclick="closeLogoutConfirm()">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
// ฟังก์ชันเปิด-ปิดแถบเมนูขวา
function openMenu() {
    document.getElementById("sideMenuOverlay").style.display = "block";
}
function closeMenu() { document.getElementById("sideMenuOverlay").style.display = "none"; }

// ฟังก์ชันเปิด-ปิดหน้าต่างยืนยัน Logout
function openLogoutConfirm() {
    document.getElementById("userLogoutModal").style.display = "flex";
}
function closeLogoutConfirm() {
    document.getElementById("userLogoutModal").style.display = "none";
}
</script>