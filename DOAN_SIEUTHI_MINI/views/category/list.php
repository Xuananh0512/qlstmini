<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý Danh Mục</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?controller=category&action=add" class="btn btn-sm btn-primary">+ Thêm mới</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Mã DM</th>
                <th>Tên Danh Mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($data) && is_object($data)): ?>
                <?php while ($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['maDM'] ?></td>
                        <td><?= $row['tenDM'] ?></td>
                        <td>
                            <a href="index.php?controller=category&action=edit&id=<?= $row['maDM'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="index.php?controller=category&action=delete&id=<?= $row['maDM'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa danh mục này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>