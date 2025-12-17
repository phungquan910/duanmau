<?php
class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        $view = 'login';
        $title = 'Đăng nhập';
        require_once PATH_VIEW_CLIENT_MAIN;
    }

    public function authenticate() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate username
        if (empty($username)) {
            $_SESSION['error'] = 'Username không được để trống.';
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }
        
        if (strlen($username) < 3 || strlen($username) > 30) {
            $_SESSION['error'] = 'Độ dài Username phải nằm trong khoảng 3 đến 30 ký tự.';
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }

        // Validate password
        if (empty($password)) {
            $_SESSION['error'] = 'Password không được để trống.';
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }
        
        if (strlen($password) < 6 || strlen($password) > 10) {
            $_SESSION['error'] = 'Độ dài Password phải nằm trong khoảng 6 đến 10 ký tự.';
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }

        $user = $this->userModel->findByUsername($username);
        
        if ($user && (password_verify($password, $user['password']) || $password === $user['password'])) {
            $_SESSION['user_logged'] = true;
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL);
            exit();
        } else {
            $_SESSION['error'] = 'Username hoặc Password đã nhập sai.';
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }
    }

    public function logout() {
        unset($_SESSION['user_logged']);
        unset($_SESSION['user']);
        header('Location: ' . BASE_URL . '?action=login');
        exit();
    }
}
?>