<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý Nhà Cung Cấp</h1>
    <a href="index.php?controller=provide&action=add" class="btn btn-sm btn-primary">+ Thêm mới</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên NCC</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data)) while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['maNCC'] ?></td>
                <td><?= $row['tenNCC'] ?></td>
                <td><?= $row['soDienThoai'] ?></td>
                <td><?= $row['diaChi'] ?></td>
                <td>
                    <a href="index.php?controller=provide&action=edit&id=<?= $row['maNCC'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="index.php?controller=provide&action=delete&id=<?= $row['maNCC'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa?');">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>