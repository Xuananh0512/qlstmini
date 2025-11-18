<?php
require_once 'Database.php';

class ImportModel extends Database {
    public function getAll() {
        $sql = "SELECT * FROM PhieuNhap";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM PhieuNhap WHERE maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($maNV, $maNCC, $ngayNhap, $tongGiaTri) {
        $sql = "INSERT INTO PhieuNhap (maNV, maNCC, ngayNhap, tongGiaTri) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisd", $maNV, $maNCC, $ngayNhap, $tongGiaTri);
        return $stmt->execute();
    }

    public function update($maPN, $maNV, $maNCC, $ngayNhap, $tongGiaTri) {
        $sql = "UPDATE PhieuNhap SET maNV=?, maNCC=?, ngayNhap=?, tongGiaTri=? WHERE maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdi", $maNV, $maNCC, $ngayNhap, $tongGiaTri, $maPN);
        return $stmt->execute();
    }

    public function delete($maPN) {
        $sql = "DELETE FROM PhieuNhap WHERE maPN=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $maPN);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM PhieuNhap WHERE maPN LIKE ?";
        $keyword = "%$keyword%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
