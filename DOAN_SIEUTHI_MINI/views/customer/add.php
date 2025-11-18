<h2 class="mt-3">Thêm Khách Hàng</h2>
<form method="POST" action="">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Họ tên (*)</label>
            <input type="text" class="form-control" name="hoTenKH" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Số điện thoại (*)</label>
            <input type="text" class="form-control" name="soDienThoai" required>
        </div>
    </div>
    <div class="mb-3">
        <label>Địa chỉ</label>
        <input type="text" class="form-control" name="diaChi">
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Ngày sinh</label>
            <input type="date" class="form-control" name="ngaySinh">
        </div>
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu khách hàng</button>
</form>