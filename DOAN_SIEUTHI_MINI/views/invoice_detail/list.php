<h2>Invoice Details</h2>
<p><a href="index.php?controller=invoice_detail&action=add">Add Detail</a></p>
<table border="1">
<tr>
<th>Invoice ID</th><th>Product ID</th><th>Quantity</th><th>Unit Price</th><th>Total</th><th>Action</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
<td><?= $row['maHD'] ?></td>
<td><?= $row['maSP'] ?></td>
<td><?= $row['soLuong'] ?></td>
<td><?= $row['donGiaLucMua'] ?></td>
<td><?= $row['thanhTien'] ?></td>
<td>
    <a href="index.php?controller=invoice_detail&action=edit&maHD=<?= $row['maHD'] ?>&maSP=<?= $row['maSP'] ?>">Edit</a>
    <a href="index.php?controller=invoice_detail&action=delete&maHD=<?= $row['maHD'] ?>&maSP=<?= $row['maSP'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
