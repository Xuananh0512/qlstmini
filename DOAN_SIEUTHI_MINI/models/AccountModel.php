<?php
require_once 'Database.php';

class AccountModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM TaiKhoan";
        return $this->conn->query($sql);
    }

    public function getById($maTK) {
        $sql = "SELECT * FROM TaiKhoan WHERE maTK=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maTK);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maVaiTro, $maNV, $tenDangNhap, $matKhau, $trangThai = 1) {
        $sql = "INSERT INTO TaiKhoan (maVaiTro, maNV, tenDangNhap, matKhau, trangThai) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iissi", $maVaiTro, $maNV, $tenDangNhap, $matKhau, $trangThai);
        return $stmt->execute();
    }

    public function update($maTK, $maVaiTro, $maNV, $tenDangNhap, $matKhau, $trangThai) {
        $sql = "UPDATE TaiKhoan SET maVaiTro=?, maNV=?, tenDangNhap=?, matKhau=?, trangThai=? WHERE maTK=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iissii", $maVaiTro, $maNV, $tenDangNhap, $matKhau, $trangThai, $maTK);
        return $stmt->execute();
    }

    public function delete($maTK) {
        $sql = "DELETE FROM TaiKhoan WHERE maTK=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maTK);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM TaiKhoan WHERE tenDangNhap LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
