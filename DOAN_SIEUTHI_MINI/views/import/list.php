<h2>Import Receipt List</h2>
<p><a href="index.php?controller=import&action=add">Add Receipt</a></p>
<table border="1">
<tr><th>ID</th><th>Employee</th><th>Provider</th><th>Date</th><th>Total</th><th>Action</th></tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
<td><?= $row['maPN'] ?></td>
<td><?= $row['maNV'] ?></td>
<td><?= $row['maNCC'] ?></td>
<td><?= $row['ngayNhap'] ?></td>
<td><?= $row['tongGiaTri'] ?></td>
<td>
    <a href="index.php?controller=import&action=edit&id=<?= $row['maPN'] ?>">Edit</a>
    <a href="index.php?controller=import&action=delete&id=<?= $row['maPN'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
