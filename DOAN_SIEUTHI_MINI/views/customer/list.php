<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý Khách Hàng</h1>
    <a href="index.php?controller=customer&action=add" class="btn btn-sm btn-primary">+ Thêm mới</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã KH</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th>Điểm tích lũy</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data)) while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['maKH'] ?></td>
                <td><?= $row['hoTenKH'] ?></td>
                <td><?= $row['soDienThoai'] ?></td>
                <td><?= $row['diemTichLuy'] ?></td>
                <td>
                    <a href="index.php?controller=customer&action=edit&id=<?= $row['maKH'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>