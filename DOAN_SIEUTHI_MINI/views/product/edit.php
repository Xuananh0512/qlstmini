<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="post" action="index.php?controller=product&action=edit&id=<?= $item['maSP'] ?>">
        <p>
            Name: <input type="text" name="tenSP" value="<?= $item['tenSP'] ?>" required>
        </p>
        <p>
            Category ID: <input type="number" name="maDM" value="<?= $item['maDM'] ?>" required>
        </p>
        <p>
            Provider ID: <input type="number" name="maNCC" value="<?= $item['maNCC'] ?>" required>
        </p>
        <p>
            Price: <input type="number" name="donGiaBan" step="0.01" value="<?= $item['donGiaBan'] ?>" required>
        </p>
        <p>
            Quantity: <input type="number" name="soLuongTon" value="<?= $item['soLuongTon'] ?>" required>
        </p>
        <p>
            Unit: <input type="text" name="donViTinh" value="<?= $item['donViTinh'] ?>" required>
        </p>
        <p>
            Expiry Date: <input type="date" name="hanSuDung" value="<?= $item['hanSuDung'] ?>">
        </p>
        <p>
            Description: <textarea name="moTa"><?= $item['moTa'] ?></textarea>
        </p>
        <p>
            <button type="submit">Update Product</button>
            <a href="index.php?controller=product&action=list">Cancel</a>
        </p>
    </form>
</body>
</html>
