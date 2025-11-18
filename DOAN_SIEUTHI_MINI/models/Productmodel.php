<?php
require_once 'Database.php';

class ProductModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM SanPham";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM SanPham WHERE maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maDM, $maNCC, $tenSP, $donGiaBan, $soLuongTon, $donViTinh, $hanSuDung, $moTa) {
        $sql = "INSERT INTO SanPham (maDM, maNCC, tenSP, donGiaBan, soLuongTon, donViTinh, hanSuDung, moTa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdisss", $maDM, $maNCC, $tenSP, $donGiaBan, $soLuongTon, $donViTinh, $hanSuDung, $moTa);
        return $stmt->execute();
    }

    public function update($maSP, $maDM, $maNCC, $tenSP, $donGiaBan, $soLuongTon, $donViTinh, $hanSuDung, $moTa) {
        $sql = "UPDATE SanPham SET maDM=?, maNCC=?, tenSP=?, donGiaBan=?, soLuongTon=?, donViTinh=?, hanSuDung=?, moTa=? WHERE maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdisssi", $maDM, $maNCC, $tenSP, $donGiaBan, $soLuongTon, $donViTinh, $hanSuDung, $moTa, $maSP);
        return $stmt->execute();
    }

    public function delete($maSP) {
        $sql = "DELETE FROM SanPham WHERE maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maSP);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM SanPham WHERE tenSP LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
