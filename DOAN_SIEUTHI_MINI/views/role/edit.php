<h2>Edit Role</h2>
<form method="post" action="index.php?controller=role&action=edit&id=<?= $item['maVaiTro'] ?>">
    Name: <input type="text" name="tenVaiTro" value="<?= $item['tenVaiTro'] ?>" required>
    <button type="submit">Update</button>
    <a href="index.php?controller=role&action=list">Cancel</a>
</form>
