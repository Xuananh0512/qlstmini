<?php
require_once 'Database.php';

class ImportDetailModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM ChiTietPhieuNhap";
        return $this->conn->query($sql);
    }

    public function getById($maSP, $maPN) {
        $sql = "SELECT * FROM ChiTietPhieuNhap WHERE maSP=? AND maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $maSP, $maPN);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maSP, $maPN, $soLuong, $giaNhap, $thanhTien) {
        $sql = "INSERT INTO ChiTietPhieuNhap (maSP, maPN, soLuong, giaNhap, thanhTien) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiidd", $maSP, $maPN, $soLuong, $giaNhap, $thanhTien);
        return $stmt->execute();
    }

    public function update($maSP, $maPN, $soLuong, $giaNhap, $thanhTien) {
        $sql = "UPDATE ChiTietPhieuNhap SET soLuong=?, giaNhap=?, thanhTien=? WHERE maSP=? AND maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iddii", $soLuong, $giaNhap, $thanhTien, $maSP, $maPN);
        return $stmt->execute();
    }

    public function delete($maSP, $maPN) {
        $sql = "DELETE FROM ChiTietPhieuNhap WHERE maSP=? AND maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $maSP, $maPN);
        return $stmt->execute();
    }

    public function search($maPN) {
        $sql = "SELECT * FROM ChiTietPhieuNhap WHERE maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maPN);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
