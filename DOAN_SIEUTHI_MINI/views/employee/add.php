<h2>Add Employee</h2>
<form method="post" action="index.php?controller=employee&action=add">
    Name: <input type="text" name="hoTenNV" required><br>
    Role ID: <input type="number" name="maVaiTro" required><br>
    Birthday: <input type="date" name="ngaySinh"><br>
    Address: <input type="text" name="diaChi"><br>
    Phone: <input type="text" name="soDienThoai"><br>
    Email: <input type="email" name="email"><br>
    Start Date: <input type="date" name="ngayVaoLam"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=employee&action=list">Cancel</a>
</form>
