<?php
require_once 'Database.php';

class InvoiceModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM HoaDon";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM HoaDon WHERE maHD=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maNV, $maKH, $ngayTao, $tongTien, $tienKhachDua, $tienThoi) {
        $sql = "INSERT INTO HoaDon (maNV, maKH, ngayTao, tongTien, tienKhachDua, tienThoi) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisddd", $maNV, $maKH, $ngayTao, $tongTien, $tienKhachDua, $tienThoi);
        return $stmt->execute();
    }

    public function update($maHD, $maNV, $maKH, $ngayTao, $tongTien, $tienKhachDua, $tienThoi) {
        $sql = "UPDATE HoaDon SET maNV=?, maKH=?, ngayTao=?, tongTien=?, tienKhachDua=?, tienThoi=? WHERE maHD=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdddi", $maNV, $maKH, $ngayTao, $tongTien, $tienKhachDua, $tienThoi, $maHD);
        return $stmt->execute();
    }

    public function delete($maHD) {
        $sql = "DELETE FROM HoaDon WHERE maHD=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maHD);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM HoaDon WHERE maHD LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
