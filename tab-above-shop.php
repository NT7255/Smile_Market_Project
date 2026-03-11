<div class="pt7">
    <button class="big-button-or1" onclick="toggleSidebar()">
        <svg class="profile-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 6c-2.28 0-4 1.72-4 4s1.72 4 4 4 4-1.72 4-4-1.72-4-4-4m0 6c-1.18 0-2-.82-2-2s.82-2 2-2 2 .82 2 2-.82 2-2 2"></path>
            <path d="M12 2C6.49 2 2 6.49 2 12c0 3.26 1.58 6.16 4 7.98V20h.03c1.67 1.25 3.73 2 5.97 2s4.31-.75 5.97-2H18v-.02c2.42-1.83 4-4.72 4-7.98 0-5.51-4.49-10-10-10M8.18 19.02C8.59 17.85 9.69 17 11 17h2c1.31 0 2.42.85 2.82 2.02-1.14.62-2.44.98-3.82.98s-2.69-.35-3.82-.98m9.3-1.21c-.81-1.66-2.51-2.82-4.48-2.82h-2c-1.97 0-3.66 1.16-4.48 2.82A7.96 7.96 0 0 1 4 11.99c0-4.41 3.59-8 8-8s8 3.59 8 8c0 2.29-.97 4.36-2.52 5.82"></path>
        </svg>
        <b>บัญชีของฉัน</b>
    </button>
</div>

<div id="userSidebar" class="user-sidebar">
    <div class="sidebar-header">
        <img src="images/user_avatar.png" class="user-img">
        <div class="user-info">
            <h3>ณัฐพล ตระกูลบางคล้า</h3>
            <p>ID : 1234567890</p>
        </div>
    </div>
    <hr>
    <div class="sidebar-links">
        <a href="edit_profile.php" class="side-link">แก้ไขข้อมูลส่วนตัว</a>
        <a href="history.php" class="side-link">ประวัติการสั่งซื้อ</a>
        <a href="contact.php" class="side-link">ปุ่มติดต่อ</a>
        
        <a href="logout.php" class="logout-side-btn">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M16 13v-2H7V9l-5 3 5 3v-2h9z"></path><path d="M20 3H9c-1.103 0-2 .897-2 2v4h2V5h11v14H9v-4H7v4c0 1.103.897 2 2 2h11c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
            ออกจากระบบ
        </a>
    </div>
</div>

<script>
function toggleSidebar() {
    var sidebar = document.getElementById("userSidebar");
    sidebar.classList.toggle("active");
}
</script>