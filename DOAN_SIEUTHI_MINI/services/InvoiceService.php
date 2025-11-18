<?php
class InvoiceService {
    private $model;
    private $detailModel;
    private $productModel;

    public function __construct() {
        $this->model = new InvoiceModel();
        $this->detailModel = new InvoiceDetailModel();
        $this->productModel = new ProductModel();
    }

    public function getAll() { return $this->model->getAll(); }

    public function getById($id) {
        $details = $this->detailModel->search($id);
        return [
            'info' => $this->model->getById($id),
            'details' => $details
        ];
    }

    public function createInvoice($data) {
        $maNV = 1; 
        $maKH = $data['maKH'];
        $ngayTao = date('Y-m-d H:i:s');
        
        // Tính tổng tiền
        $tongTien = 0;
        if (isset($data['products'])) {
            foreach ($data['products'] as $p) {
                // Lấy giá bán hiện tại từ DB để bảo mật giá
                $prodInfo = $this->productModel->getById($p['maSP']);
                $tongTien += ($p['soLuong'] * $prodInfo['donGiaBan']);
            }
        }
        $tienKhachDua = $data['tienKhachDua'];
        $tienThoi = $tienKhachDua - $tongTien;

        // 1. Tạo hóa đơn
        $this->model->add($maNV, $maKH, $ngayTao, $tongTien, $tienKhachDua, $tienThoi);
        
        // Lấy ID hóa đơn vừa tạo
        $db = new Database();
        $maHD = $db->conn->insert_id;

        if ($maHD && isset($data['products'])) {
            foreach ($data['products'] as $prod) {
                if (empty($prod['maSP'])) continue;
                
                $product = $this->productModel->getById($prod['maSP']);
                $thanhTien = $prod['soLuong'] * $product['donGiaBan'];

                // 2. Lưu chi tiết
                $this->detailModel->add($maHD, $prod['maSP'], $prod['soLuong'], $product['donGiaBan'], $thanhTien);

                // 3. TRỪ TỒN KHO
                $newStock = $product['soLuongTon'] - $prod['soLuong'];
                $this->productModel->update(
                    $prod['maSP'], $product['maDM'], $product['maNCC'], $product['tenSP'], 
                    $product['donGiaBan'], $newStock, $product['donViTinh'], 
                    $product['hanSuDung'], $product['moTa']
                );
            }
            return true;
        }
        return false;
    }

    public function delete($id) { return $this->model->delete($id); }
    public function search($key) { return $this->model->search($key); }
}
?>