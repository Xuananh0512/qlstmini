<?php
require_once 'Database.php';

class CustomerModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM KhachHang";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM KhachHang WHERE maKH=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($hoTenKH, $soDienThoai, $diaChi, $ngaySinh, $email, $diemTichLuy = 0) {
        $sql = "INSERT INTO KhachHang (hoTenKH, soDienThoai, diaChi, ngaySinh, email, diemTichLuy) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $hoTenKH, $soDienThoai, $diaChi, $ngaySinh, $email, $diemTichLuy);
        return $stmt->execute();
    }

    public function update($maKH, $hoTenKH, $soDienThoai, $diaChi, $ngaySinh, $email, $diemTichLuy) {
        $sql = "UPDATE KhachHang SET hoTenKH=?, soDienThoai=?, diaChi=?, ngaySinh=?, email=?, diemTichLuy=? WHERE maKH=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssiii", $hoTenKH, $soDienThoai, $diaChi, $ngaySinh, $email, $diemTichLuy, $maKH);
        return $stmt->execute();
    }

    public function delete($maKH) {
        $sql = "DELETE FROM KhachHang WHERE maKH=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maKH);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM KhachHang WHERE hoTenKH LIKE ? OR email LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
