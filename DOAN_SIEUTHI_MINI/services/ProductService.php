<?php
class ProductService {
    private $model;
    public function __construct() { $this->model = new ProductModel(); }
    public function getAll() { return $this->model->getAll(); }
    public function getById($id) { return $this->model->getById($id); }
    
    public function add($data) {
        return $this->model->add(
            $data['maDM'], 
            $data['maNCC'], 
            $data['tenSP'], 
            $data['dongiaBan'], // Chú ý: khớp với name input bên View
            $data['soLuongTon'] ?? 0, 
            $data['donViTinh'], 
            $data['hanSuDung'], 
            $data['moTa']
        );
    }

    public function update($id, $data) {
        return $this->model->update(
            $id,
            $data['maDM'], 
            $data['maNCC'], 
            $data['tenSP'], 
            $data['dongiaBan'], 
            $data['soLuongTon'] ?? 0, 
            $data['donViTinh'], 
            $data['hanSuDung'], 
            $data['moTa']
        );
    }
    public function delete($id) { return $this->model->delete($id); }
    public function search($key) { return $this->model->search($key); }
}
?>