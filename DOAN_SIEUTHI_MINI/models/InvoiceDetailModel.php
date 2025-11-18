<?php
require_once 'Database.php';

class InvoiceDetailModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM ChiTietHoaDon";
        return $this->conn->query($sql);
    }

    public function getById($maHD, $maSP) {
        $sql = "SELECT * FROM ChiTietHoaDon WHERE maHD=? AND maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $maHD, $maSP);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maHD, $maSP, $soLuong, $donGiaLucMua, $thanhTien) {
        $sql = "INSERT INTO ChiTietHoaDon (maHD, maSP, soLuong, donGiaLucMua, thanhTien) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiidd", $maHD, $maSP, $soLuong, $donGiaLucMua, $thanhTien);
        return $stmt->execute();
    }

    public function update($maHD, $maSP, $soLuong, $donGiaLucMua, $thanhTien) {
        $sql = "UPDATE ChiTietHoaDon SET soLuong=?, donGiaLucMua=?, thanhTien=? WHERE maHD=? AND maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iddii", $soLuong, $donGiaLucMua, $thanhTien, $maHD, $maSP);
        return $stmt->execute();
    }

    public function delete($maHD, $maSP) {
        $sql = "DELETE FROM ChiTietHoaDon WHERE maHD=? AND maSP=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $maHD, $maSP);
        return $stmt->execute();
    }

    public function search($maHD) {
        $sql = "SELECT * FROM ChiTietHoaDon WHERE maHD=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maHD);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
