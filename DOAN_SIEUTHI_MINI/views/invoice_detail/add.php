<h2>Add Invoice Detail</h2>
<form method="post" action="index.php?controller=invoice_detail&action=add">
    Invoice ID: <input type="number" name="maHD" required><br>
    Product ID: <input type="number" name="maSP" required><br>
    Quantity: <input type="number" name="soLuong" required><br>
    Unit Price: <input type="number" step="0.01" name="donGiaLucMua" required><br>
    Total: <input type="number" step="0.01" name="thanhTien"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=invoice_detail&action=list">Cancel</a>
</form>
