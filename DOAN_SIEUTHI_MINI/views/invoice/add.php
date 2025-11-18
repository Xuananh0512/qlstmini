<h2>Add Invoice</h2>
<form method="post" action="index.php?controller=invoice&action=add">
    Employee ID: <input type="number" name="maNV" required><br>
    Customer ID: <input type="number" name="maKH" required><br>
    Date: <input type="datetime-local" name="ngayTao"><br>
    Total: <input type="number" step="0.01" name="tongTien"><br>
    Paid: <input type="number" step="0.01" name="tienKhachDua"><br>
    Change: <input type="number" step="0.01" name="tienThoi"><br>
    <button type="submit">Add</button>
    <a href="index.php?controller=invoice&action=list">Cancel</a>
</form>
