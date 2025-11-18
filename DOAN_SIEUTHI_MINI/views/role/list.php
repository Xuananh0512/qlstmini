<h2>Role List</h2>
<form method="get" action="index.php">
    <input type="hidden" name="controller" value="role">
    <input type="hidden" name="action" value="search">
    <input type="text" name="keyword" placeholder="Search role">
    <button type="submit">Search</button>
</form>
<p><a href="index.php?controller=role&action=add">Add Role</a></p>
<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $row['maVaiTro'] ?></td>
    <td><?= $row['tenVaiTro'] ?></td>
    <td>
        <a href="index.php?controller=role&action=edit&id=<?= $row['maVaiTro'] ?>">Edit</a>
        <a href="index.php?controller=role&action=delete&id=<?= $row['maVaiTro'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
