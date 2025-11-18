<h2>Import Receipt Details</h2>
<p><a href="index.php?controller=import_detail&action=add">Add Detail</a></p>
<table border="1">
<tr>
<th>Product ID</th><th>Receipt ID</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
<td><?= $row['maSP'] ?></td>
<td><?= $row['maPN'] ?></td>
<td><?= $row['soLuong'] ?></td>
<td><?= $row['giaNhap'] ?></td>
<td><?= $row['thanhTien'] ?></td>
<td>
    <a href="index.php?controller=import_detail&action=edit&maSP=<?= $row['maSP'] ?>&maPN=<?= $row['maPN'] ?>">Edit</a>
    <a href="index.php?controller=import_detail&action=delete&maSP=<?= $row['maSP'] ?>&maPN=<?= $row['maPN'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
