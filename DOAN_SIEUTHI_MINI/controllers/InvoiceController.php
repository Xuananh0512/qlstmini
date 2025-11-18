<?php
class InvoiceController {
    private $service;
    public function __construct() { $this->service = new InvoiceService(); }
    public function list() { return $this->service->getAll(); }
    public function detail($id) { return $this->service->getById($id); }
    public function delete($id) { return $this->service->delete($id); }
    public function search($key) { return $this->service->search($key); }
    public function getById($id) { return $this->service->getById($id); }

    public function add($data) {
        if (!empty($data)) {
            return $this->service->createInvoice($data);
        } else {
            // Lấy dữ liệu cho form bán hàng
            $prodModel = new ProductModel();
            $products = $prodModel->getAll();

            $custModel = new CustomerModel();
            $customers = $custModel->getAll();

            require_once "views/invoice/add.php";
        }
    }
}
?>