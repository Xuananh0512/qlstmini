<?php
class CategoryService {
    private $model;
    public function __construct() { $this->model = new CategoryModel(); }
    public function getAll() { return $this->model->getAll(); }
    public function getById($id) { return $this->model->getById($id); }

    public function add($data) {
        // Controller gửi mảng, ta lấy phần tử ra đưa cho Model
        return $this->model->add($data['tenDM']);
    }

    public function update($id, $data) {
        return $this->model->update($id, $data['tenDM']);
    }

    public function delete($id) { return $this->model->delete($id); }
    public function search($keyword) { return $this->model->search($keyword); }
}
?>