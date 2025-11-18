<h2>Edit Import Detail</h2>
<form method="post" action="index.php?controller=import_detail&action=edit&maSP=<?= $item['maSP'] ?>&maPN=<?= $item['maPN'] ?>">
    Product ID: <input type="number" name="maSP" value="<?= $item['maSP'] ?>" required><br>
    Receipt ID: <input type="number" name="maPN" value="<?= $item['maPN'] ?>" required><br>
    Quantity: <input type="number" name="soLuong" value="<?= $item['soLuong'] ?>" required><br>
    Price: <input type="number" step="0.01" name="giaNhap" value="<?= $item['giaNhap'] ?>" required><br>
    Total: <input type="number" step="0.01" name="thanhTien" value="<?= $item['thanhTien'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=import_detail&action=list">Cancel</a>
</form>
