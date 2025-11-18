<?php
// $data từ index.php
?>
<h2>Employee List</h2>
<form method="get" action="index.php">
    <input type="hidden" name="controller" value="employee">
    <input type="hidden" name="action" value="search">
    <input type="text" name="keyword" placeholder="Search employee">
    <button type="submit">Search</button>
</form>
<p><a href="index.php?controller=employee&action=add">Add Employee</a></p>
<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Role</th>
    <th>Birthday</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Action</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $row['maNV'] ?></td>
    <td><?= $row['hoTenNV'] ?></td>
    <td><?= $row['maVaiTro'] ?></td>
    <td><?= $row['ngaySinh'] ?></td>
    <td><?= $row['soDienThoai'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="index.php?controller=employee&action=edit&id=<?= $row['maNV'] ?>">Edit</a>
        <a href="index.php?controller=employee&action=delete&id=<?= $row['maNV'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
