<?php
// 1. Cấu hình & Debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Ho_Chi_Minh');

// 2. Định nghĩa BASE_URL
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['PHP_SELF']);
define('BASE_URL', $url);

// 3. Autoload (Tự động tìm file)
spl_autoload_register(function ($className) {
    $directories = ['config/', 'models/', 'services/', 'controllers/'];
    $baseDir = __DIR__ . '/';
    foreach ($directories as $directory) {
        $file = $baseDir . $directory . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Gọi file kết nối DB
if (file_exists('config/configdb.php')) {
    require_once 'config/configdb.php';
}

// 4. Router
$controllerParam = $_GET['controller'] ?? 'product';
$actionParam = $_GET['action'] ?? 'list';
$ctrl = null;

// Khởi tạo Controller
switch ($controllerParam) {
    case 'category': $ctrl = new CategoryController(); break;
    case 'product':  $ctrl = new ProductController(); break;
    case 'account':  $ctrl = new AccountController(); break;
    case 'employee': $ctrl = new EmployeeController(); break;
    case 'customer': $ctrl = new CustomerController(); break;
    case 'role':     $ctrl = new RoleController(); break;
    
    // Chú ý: Tên case phải khớp với logic, tên class phải khớp tên file
    case 'provide':  $ctrl = new ProvideController(); break; 
    case 'import':   $ctrl = new ImportController(); break;
    case 'invoice':  $ctrl = new InvoiceController(); break;

    default: die("Lỗi: Controller '$controllerParam' không tồn tại.");
}

// 5. Xử lý Action & View
$viewFile = "";
switch ($actionParam) {
    case 'list':
        $data = $ctrl->list();
        $viewFile = "views/$controllerParam/list.php";
        break;
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ctrl->add($_POST);
            header("Location: " . BASE_URL . "index.php?controller=$controllerParam&action=list");
            exit;
        } else {
            // Logic đặc biệt cho import (cần lấy dữ liệu SP/NCC trước khi hiện form)
            if ($controllerParam == 'import') { 
                // ImportController->add() sẽ tự include view kèm dữ liệu
                $ctrl->add([]); 
                return; 
            }
            $viewFile = "views/$controllerParam/add.php";
        }
        break;
    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) die("Thiếu ID.");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ctrl->update($id, $_POST);
            header("Location: " . BASE_URL . "index.php?controller=$controllerParam&action=list");
            exit;
        } else {
            $item = $ctrl->getById($id);
            $viewFile = "views/$controllerParam/edit.php";
        }
        break;
    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) $ctrl->delete($id);
        header("Location: " . BASE_URL . "index.php?controller=$controllerParam&action=list");
        exit;
        break;
    case 'detail': // Dành cho Import/Invoice
        $id = $_GET['id'] ?? null;
        $data = $ctrl->detail($id);
        $viewFile = "views/$controllerParam/detail.php";
        break;
    case 'search':
        $keyword = $_GET['keyword'] ?? '';
        $data = $ctrl->search($keyword);
        $viewFile = "views/$controllerParam/list.php";
        break;
    default: die("Lỗi: Action không hợp lệ.");
}

// 6. Gọi Giao diện chính
if (file_exists('mains/main.php')) {
    require_once 'mains/main.php';
} else {
    if (file_exists($viewFile)) require_once $viewFile;
}
?>