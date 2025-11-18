<?php
class ImportController {
    private $service;
    public function __construct() { $this->service = new ImportService(); }
    public function list() { return $this->service->getAll(); }
    public function detail($id) { return $this->service->getById($id); }
    public function delete($id) { return $this->service->delete($id); }
    public function search($key) { return $this->service->search($key); }
    public function getById($id) { return $this->service->getById($id); }

    public function add($data) {
        // Nếu có dữ liệu POST thì gọi service để lưu
        if (!empty($data)) {
            return $this->service->createImport($data);
        } 
        // Nếu không (GET), chuẩn bị dữ liệu để hiển thị Form
        else {
            // Gọi Model lấy danh sách Sản phẩm & NCC
            $prodModel = new ProductModel();
            $products = $prodModel->getAll();
            
            $provModel = new ProvideModel();
            $providers = $provModel->getAll();
            
            require_once "views/import/add.php";
        }
    }
}
?>