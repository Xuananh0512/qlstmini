<?php
class ImportService {
    private $importModel;
    private $detailModel;

    public function __construct() {
        $this->importModel = new ImportModel();
        $this->detailModel = new ImportDetailModel(); // Sửa lại tên Class Model cho đúng
    }

    public function getAll() { return $this->importModel->getAll(); }

    public function getById($id) {
        // Lấy chi tiết sản phẩm của phiếu nhập này
        // Lưu ý: Cần đảm bảo ImportDetailModel có hàm search($maPN) trả về list
        $details = $this->detailModel->search($id); 
        return [
            'info' => $this->importModel->getById($id),
            'details' => $details
        ];
    }

    public function createImport($data) {
        // 1. Tạo phiếu nhập
        $maNV = 1; // Mặc định admin, sau này lấy Session
        $maNCC = $data['maNCC'];
        $ngayNhap = date('Y-m-d H:i:s');
        $tongGiaTri = 0;

        $this->importModel->add($maNV, $maNCC, $ngayNhap, $tongGiaTri);
        
        // Lấy ID phiếu vừa tạo
        $db = new Database();
        $maPN = $db->conn->insert_id;

        if ($maPN && isset($data['products'])) {
            foreach ($data['products'] as $prod) {
                if (empty($prod['maSP'])) continue;
                
                $thanhTien = $prod['soLuong'] * $prod['giaNhap'];
                $tongGiaTri += $thanhTien;

                // 2. Thêm chi tiết
                $this->detailModel->add($prod['maSP'], $maPN, $prod['soLuong'], $prod['giaNhap'], $thanhTien);
            }
            
            // 3. Cập nhật lại tổng tiền
            $this->importModel->update($maPN, $maNV, $maNCC, $ngayNhap, $tongGiaTri);
            return true;
        }
        return false;
    }
    
    public function delete($id) { return $this->importModel->delete($id); }
    public function search($key) { return $this->importModel->search($key); }
}
?>