<?php
// $data được truyền từ index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a { margin: 0 5px; }
    </style>
</head>
<body>
    <h2>Product List</h2>

    <form method="get" action="index.php">
        <input type="hidden" name="controller" value="product">
        <input type="hidden" name="action" value="search">
        <input type="text" name="keyword" placeholder="Search product">
        <button type="submit">Search</button>
    </form>

    <p><a href="index.php?controller=product&action=add">Add New Product</a></p>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Provider</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $row['maSP'] ?></td>
            <td><?= $row['tenSP'] ?></td>
            <td><?= $row['maDM'] ?></td>
            <td><?= $row['maNCC'] ?></td>
            <td><?= $row['donGiaBan'] ?></td>
            <td><?= $row['soLuongTon'] ?></td>
            <td>
                <a href="index.php?controller=product&action=edit&id=<?= $row['maSP'] ?>">Edit</a>
                <a href="index.php?controller=product&action=delete&id=<?= $row['maSP'] ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
