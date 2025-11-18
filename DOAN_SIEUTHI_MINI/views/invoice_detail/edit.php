<h2>Edit Invoice Detail</h2>
<form method="post" action="index.php?controller=invoice_detail&action=edit&maHD=<?= $item['maHD'] ?>&maSP=<?= $item['maSP'] ?>">
    Invoice ID: <input type="number" name="maHD" value="<?= $item['maHD'] ?>" required><br>
    Product ID: <input type="number" name="maSP" value="<?= $item['maSP'] ?>" required><br>
    Quantity: <input type="number" name="soLuong" value="<?= $item['soLuong'] ?>" required><br>
    Unit Price: <input type="number" step="0.01" name="donGiaLucMua" value="<?= $item['donGiaLucMua'] ?>" required><br>
    Total: <input type="number" step="0.01" name="thanhTien" value="<?= $item['thanhTien'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=invoice_detail&action=list">Cancel</a>
</form>
