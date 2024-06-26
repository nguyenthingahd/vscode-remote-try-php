<?php
session_start();

if (!isset($_SESSION['username'])) {
   
    exit();
}

require_once '../models/Sach.php';

class SachController {
    public function index($db) {
        // Gọi hàm lấy danh sách sách từ model
        $sachModel = new Sach($db);
        $sachList = $sachModel->getList();
    
        include '../views/sach/sach.php';
    }
}

// Kết nối đến cơ sở dữ liệu

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sachController = new SachController();
$sachController->index($conn);

$conn->close();
?>
