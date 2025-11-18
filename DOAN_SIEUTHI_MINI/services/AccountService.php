<?php
class AccountService {
    private $model;
    public function __construct() { $this->model = new AccountModel(); }
    public function getAll() { return $this->model->getAll(); }
    public function getById($id) { return $this->model->getById($id); }

    public function add($data) {
        return $this->model->add(
            $data['maVaiTro'], 
            $data['maNV'], 
            $data['tenDangNhap'], 
            $data['matKhau'],
            $data['trangThai'] ?? 1
        );
    }

    public function update($id, $data) {
        return $this->model->update(
            $id,
            $data['maVaiTro'], 
            $data['maNV'], 
            $data['tenDangNhap'], 
            $data['matKhau'],
            $data['trangThai']
        );
    }

    public function delete($id) { return $this->model->delete($id); }
    public function search($keyword) { return $this->model->search($keyword); }
}
?>