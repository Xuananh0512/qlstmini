<h2>Edit Customer</h2>
<form method="post" action="index.php?controller=customer&action=edit&id=<?= $item['maKH'] ?>">
    Name: <input type="text" name="hoTenKH" value="<?= $item['hoTenKH'] ?>" required><br>
    Phone: <input type="text" name="soDienThoai" value="<?= $item['soDienThoai'] ?>"><br>
    Address: <input type="text" name="diaChi" value="<?= $item['diaChi'] ?>"><br>
    Birthday: <input type="date" name="ngaySinh" value="<?= $item['ngaySinh'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $item['email'] ?>"><br>
    Points: <input type="number" name="diemTichLuy" value="<?= $item['diemTichLuy'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=customer&action=list">Cancel</a>
</form>
