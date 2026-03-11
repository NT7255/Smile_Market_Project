<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tab-menu.css">
    <title>Document</title>
</head>
<body>
    <div class="side-menu-container">
    <div class="profile-section">
        <div class="profile-image-circle">
            <img src="images/profile.jpg" alt="User Profile">
        </div>
        <div class="profile-text">
            <h2 class="user-name">ณัฐพล ตระกูลบางคล้า</h2>
            <p class="user-id">ID : 1234567890</p>
        </div>
    </div>

    <div class="divider-line"></div>

    <div class="options-group">
        <a href="edit_profile.php" class="option-btn">แก้ไขข้อมูลส่วนตัว</a>
        <a href="contact.php" class="option-btn">ช่องทางการติดต่อ</a>
    </div>

    <div class="bottom-section">
        <a href="logout.php" class="logout-full-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16 13v-2H7V9l-5 3 5 3v-2h9z"></path>
                <path d="M20 3H9c-1.103 0-2 .897-2 2v4h2V5h11v14H9v-4H7v4c0 1.103.897 2 2 2h11c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path>
            </svg>
            <span>ออกจากระบบ</span>
        </a>
    </div>
</div>
</body>
</html>