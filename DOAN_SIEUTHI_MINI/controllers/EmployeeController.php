<?php
class EmployeeController {
    private $service;
    public function __construct() { $this->service = new EmployeeService(); }
    public function list() { return $this->service->getAll(); }
    public function add($data) { return $this->service->add($data); }
    public function update($id, $data) { return $this->service->update($id, $data); }
    public function delete($id) { return $this->service->delete($id); }
    public function search($key) { return $this->service->search($key); }
    public function getById($id) { return $this->service->getById($id); }
}
?>