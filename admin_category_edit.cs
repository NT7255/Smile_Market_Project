/* admin_category_edit.css - Version Complete */
body { 
    font-family: 'Kanit', sans-serif; 
    background-color: #f8f9fa; 
}

.main_size.compact-size { 
    max-width: 600px; /* ขยายจาก 500px ให้ดูไม่อึดอัดเกินไป */
    margin: 40px auto; 
    background: white; 
    padding: 40px; 
    border-radius: 15px; 
    box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
}

.header-content h1 {
    font-size: 22px;
    text-align: center;
}

.category-list {
    margin-top: 10px;
}

.category-item { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    padding: 18px 15px; 
    border-bottom: 1px solid #eee; 
    transition: 0.2s;
}

.category-item:hover {
    background-color: #fffcf9;
}

.category-item span {
    font-size: 16px;
    font-weight: 400;
    color: #333;
}

/* ปุ่มใช้ชุดเดียวกับ admin_goods_edit */
.btn-edit-sm { 
    color: #007bff; 
    background: white; 
    border: 1px solid #007bff; 
    padding: 5px 12px; 
    border-radius: 6px; 
    cursor: pointer; 
    margin-right: 8px; 
    font-size: 14px;
    transition: 0.3s;
}

.btn-edit-sm:hover { background: #007bff; color: white; }

.btn-del-sm { 
    color: #dc3545; 
    background: white; 
    border: 1px solid #dc3545; 
    padding: 5px 12px; 
    border-radius: 6px; 
    cursor: pointer; 
    font-size: 14px;
    transition: 0.3s;
}

.btn-del-sm:hover { background: #dc3545; color: white; }

.line { margin-top: 20px; border-bottom: 1px solid #eee; }

