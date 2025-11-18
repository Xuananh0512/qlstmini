<h2>Edit Employee</h2>
<form method="post" action="index.php?controller=employee&action=edit&id=<?= $item['maNV'] ?>">
    Name: <input type="text" name="hoTenNV" value="<?= $item['hoTenNV'] ?>" required><br>
    Role ID: <input type="number" name="maVaiTro" value="<?= $item['maVaiTro'] ?>" required><br>
    Birthday: <input type="date" name="ngaySinh" value="<?= $item['ngaySinh'] ?>"><br>
    Address: <input type="text" name="diaChi" value="<?= $item['diaChi'] ?>"><br>
    Phone: <input type="text" name="soDienThoai" value="<?= $item['soDienThoai'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $item['email'] ?>"><br>
    Start Date: <input type="date" name="ngayVaoLam" value="<?= $item['ngayVaoLam'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=employee&action=list">Cancel</a>
</form>
