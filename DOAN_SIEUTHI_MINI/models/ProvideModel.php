<?php
require_once 'Database.php';

class ProvideModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM NhaCungCap";
        return $this->conn->query($sql);
    }

    public function getById($maNCC) {
        $sql = "SELECT * FROM NhaCungCap WHERE maNCC=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maNCC);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($tenNCC, $soDienThoai, $diaChi) {
        $sql = "INSERT INTO NhaCungCap (tenNCC, soDienThoai, diaChi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $tenNCC, $soDienThoai, $diaChi);
        return $stmt->execute();
    }

    public function update($maNCC, $tenNCC, $soDienThoai, $diaChi) {
        $sql = "UPDATE NhaCungCap SET tenNCC=?, soDienThoai=?, diaChi=? WHERE maNCC=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $tenNCC, $soDienThoai, $diaChi, $maNCC);
        return $stmt->execute();
    }

    public function delete($maNCC) {
        $sql = "DELETE FROM NhaCungCap WHERE maNCC=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maNCC);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM NhaCungCap WHERE tenNCC LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
