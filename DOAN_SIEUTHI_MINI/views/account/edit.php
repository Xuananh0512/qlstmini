<h2>Edit Account</h2>
<form method="post" action="index.php?controller=account&action=edit&id=<?= $item['maTK'] ?>">
    Username: <input type="text" name="tenDangNhap" value="<?= $item['tenDangNhap'] ?>" required><br>
    Password: <input type="password" name="matKhau" value="<?= $item['matKhau'] ?>" required><br>
    Role ID: <input type="number" name="maVaiTro" value="<?= $item['maVaiTro'] ?>"><br>
    Employee ID: <input type="number" name="maNV" value="<?= $item['maNV'] ?>"><br>
    Status: <input type="number" name="trangThai" value="<?= $item['trangThai'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=account&action=list">Cancel</a>
</form>
