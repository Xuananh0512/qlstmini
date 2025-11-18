<h2>Add Import Detail</h2>
<form method="post" action="index.php?controller=import_detail&action=add">
    Product ID: <input type="number" name="maSP" required><br>
    Receipt ID: <input type="number" name="maPN" required><br>
    Quantity: <input type="number" name="soLuong" required><br>
    Price: <input type="number" step="0.01" name="giaNhap" required><br>
    Total: <input type="number" step="0.01" name="thanhTien"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=import_detail&action=list">Cancel</a>
</form>
