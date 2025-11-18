<h2>Add Account</h2>
<form method="post" action="index.php?controller=account&action=add">
    Username: <input type="text" name="tenDangNhap" required><br>
    Password: <input type="password" name="matKhau" required><br>
    Role ID: <input type="number" name="maVaiTro"><br>
    Employee ID: <input type="number" name="maNV"><br>
    Status: <input type="number" name="trangThai" value="1"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=account&action=list">Cancel</a>
</form>
