<?php
class CustomerService {
    private $model;
    public function __construct() { $this->model = new CustomerModel(); }
    public function getAll() { return $this->model->getAll(); }
    public function getById($id) { return $this->model->getById($id); }

    public function add($data) {
        return $this->model->add(
            $data['hoTenKH'], 
            $data['soDienThoai'], 
            $data['diaChi'], 
            $data['ngaySinh'], 
            $data['email'],
            $data['diemTichLuy'] ?? 0
        );
    }

    public function update($id, $data) {
        return $this->model->update(
            $id,
            $data['hoTenKH'], 
            $data['soDienThoai'], 
            $data['diaChi'], 
            $data['ngaySinh'], 
            $data['email'],
            $data['diemTichLuy']
        );
    }

    public function delete($id) { return $this->model->delete($id); }
    public function search($keyword) { return $this->model->search($keyword); }
}
?>