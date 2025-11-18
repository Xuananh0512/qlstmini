<?php
require_once 'Database.php';

class RoleModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM VaiTro";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM VaiTro WHERE maVaiTro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($tenVaiTro) {
        $sql = "INSERT INTO VaiTro (tenVaiTro) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $tenVaiTro);
        return $stmt->execute();
    }

    public function update($id, $tenVaiTro) {
        $sql = "UPDATE VaiTro SET tenVaiTro=? WHERE maVaiTro=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $tenVaiTro, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM VaiTro WHERE maVaiTro=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM VaiTro WHERE tenVaiTro LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
