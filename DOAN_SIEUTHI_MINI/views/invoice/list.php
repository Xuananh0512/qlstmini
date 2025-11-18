<h2>Invoice List</h2>
<p><a href="index.php?controller=invoice&action=add">Add Invoice</a></p>
<table border="1">
<tr>
<th>ID</th><th>Employee</th><th>Customer</th><th>Date</th><th>Total</th><th>Paid</th><th>Change</th><th>Action</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
<td><?= $row['maHD'] ?></td>
<td><?= $row['maNV'] ?></td>
<td><?= $row['maKH'] ?></td>
<td><?= $row['ngayTao'] ?></td>
<td><?= $row['tongTien'] ?></td>
<td><?= $row['tienKhachDua'] ?></td>
<td><?= $row['tienThoi'] ?></td>
<td>
    <a href="index.php?controller=invoice&action=edit&id=<?= $row['maHD'] ?>">Edit</a>
    <a href="index.php?controller=invoice&action=delete&id=<?= $row['maHD'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
