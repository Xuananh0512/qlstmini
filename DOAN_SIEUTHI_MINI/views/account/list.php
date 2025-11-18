<h2>Account List</h2>

<form method="GET" action="index.php">
    <input type="hidden" name="controller" value="account">
    <input type="hidden" name="action" value="search">
    <input type="text" name="keyword" placeholder="Search username...">
    <button type="submit">Search</button>
</form>

<a href="index.php?controller=account&action=add">Add Account</a>

<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Employee</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php if ($data && $data->num_rows > 0): ?>
        <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['MA_TK'] ?></td>
                <td><?= $row['TEN_TK'] ?></td>
                <td><?= $row['MA_VAI_TRO'] ?></td>
                <td><?= $row['MA_NV'] ?></td>
                <td><?= $row['TRANG_THAI'] ?></td>

                <td>
                    <a href="index.php?controller=account&action=edit&id=<?= $row['MA_TK'] ?>">Edit</a> |
                    <a href="index.php?controller=account&action=delete&id=<?= $row['MA_TK'] ?>"
                       onclick="return confirm('Delete this account?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" style="text-align:center">No data found</td>
        </tr>
    <?php endif; ?>

</table>
