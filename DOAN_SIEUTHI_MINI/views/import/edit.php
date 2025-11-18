<h2>Edit Import Receipt</h2>
<form method="post" action="index.php?controller=import&action=edit&id=<?= $item['maPN'] ?>">
    Employee ID: <input type="number" name="maNV" value="<?= $item['maNV'] ?>" required><br>
    Provider ID: <input type="number" name="maNCC" value="<?= $item['maNCC'] ?>" required><br>
    Date: <input type="date" name="ngayNhap" value="<?= $item['ngayNhap'] ?>"><br>
    Total: <input type="number" step="0.01" name="tongGiaTri" value="<?= $item['tongGiaTri'] ?>"><br>
    <button type="submit">Update</button>
    <a href="index.php?controller=import&action=list">Cancel</a>
</form>
