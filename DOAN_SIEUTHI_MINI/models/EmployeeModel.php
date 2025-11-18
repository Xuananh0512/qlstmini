<?php
require_once 'Database.php';

class EmployeeModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM NhanVien";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM NhanVien WHERE maNV=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maVaiTro, $hoTenNV, $ngaySinh, $diaChi, $soDienThoai, $email, $ngayVaoLam) {
        $sql = "INSERT INTO NhanVien (maVaiTro, hoTenNV, ngaySinh, diaChi, soDienThoai, email, ngayVaoLam) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssss", $maVaiTro, $hoTenNV, $ngaySinh, $diaChi, $soDienThoai, $email, $ngayVaoLam);
        return $stmt->execute();
    }

    public function update($maNV, $maVaiTro, $hoTenNV, $ngaySinh, $diaChi, $soDienThoai, $email, $ngayVaoLam, $trangThaiLamViec) {
        $sql = "UPDATE NhanVien SET maVaiTro=?, hoTenNV=?, ngaySinh=?, diaChi=?, soDienThoai=?, email=?, ngayVaoLam=?, trangThaiLamViec=? WHERE maNV=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssiii", $maVaiTro, $hoTenNV, $ngaySinh, $diaChi, $soDienThoai, $email, $ngayVaoLam, $trangThaiLamViec, $maNV);
        return $stmt->execute();
    }

    public function delete($maNV) {
        $sql = "DELETE FROM NhanVien WHERE maNV=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maNV);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM NhanVien WHERE hoTenNV LIKE ? OR email LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
