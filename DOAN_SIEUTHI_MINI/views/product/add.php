<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="post" action="index.php?controller=product&action=add">
        <p>
            Name: <input type="text" name="tenSP" required>
        </p>
        <p>
            Category ID: <input type="number" name="maDM" required>
        </p>
        <p>
            Provider ID: <input type="number" name="maNCC" required>
        </p>
        <p>
            Price: <input type="number" name="donGiaBan" step="0.01" required>
        </p>
        <p>
            Quantity: <input type="number" name="soLuongTon" required>
        </p>
        <p>
            Unit: <input type="text" name="donViTinh" required>
        </p>
        <p>
            Expiry Date: <input type="date" name="hanSuDung">
        </p>
        <p>
            Description: <textarea name="moTa"></textarea>
        </p>
        <p>
            <button type="submit">Add Product</button>
            <a href="index.php?controller=product&action=list">Cancel</a>
        </p>
    </form>
</body>
</html>
