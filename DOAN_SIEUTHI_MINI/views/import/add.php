<h2>Add Import Receipt</h2>
<form method="post" action="index.php?controller=import&action=add">
    Employee ID: <input type="number" name="maNV" required><br>
    Provider ID: <input type="number" name="maNCC" required><br>
    Date: <input type="date" name="ngayNhap"><br>
    Total: <input type="number" step="0.01" name="tongGiaTri"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=import&action=list">Cancel</a>
</form>
