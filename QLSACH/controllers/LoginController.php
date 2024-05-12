<?php
class LoginController {
    public function index() {
        // Hiển thị trang đăng nhập
        include '../views/login/login.php';
    }

    public function login($db) {
        require_once '../models/User.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User($db);
            $result = $userModel->login($username, $password);

            if ($result) {
                session_start();
                $_SESSION['username'] = $username;
                header("location: ../controllers/SachController.php");
            } else {
                header("location: ../controllers/LoginController.php?error=1");
            }
        }
    }
}
?>
