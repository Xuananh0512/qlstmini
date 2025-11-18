<?php
require_once 'Database.php';

class CategoryModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM DanhMuc";
        return $this->conn->query($sql);
    }

    public function getById($maDM) {
        $sql = "SELECT * FROM DanhMuc WHERE maDM=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maDM);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($tenDM) {
        $sql = "INSERT INTO DanhMuc (tenDM) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $tenDM);
        return $stmt->execute();
    }

    public function update($maDM, $tenDM) {
        $sql = "UPDATE DanhMuc SET tenDM=? WHERE maDM=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $tenDM, $maDM);
        return $stmt->execute();
    }

    public function delete($maDM) {
        $sql = "DELETE FROM DanhMuc WHERE maDM=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maDM);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM DanhMuc WHERE tenDM LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
