<?php
class CategoryController {
    private $service;
    public function __construct() { $this->service = new CategoryService(); }
    public function list() { return $this->service->getAll(); }
    
    public function add($data) {
        $tenDM = $data['tenDM'] ?? '';
        return $this->service->add($tenDM);
    }

    public function update($id, $data) {
        $tenDM = $data['tenDM'] ?? '';
        return $this->service->update($id, $tenDM);
    }

    public function delete($id) { return $this->service->delete($id); }
    public function search($key) { return $this->service->search($key); }
    public function getById($id) { return $this->service->getById($id); }
}
?>