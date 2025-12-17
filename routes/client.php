<?php
// Route xử lý các action cho client
$action = $_GET['action'] ?? '/';

// Kiểm tra đăng nhập (trừ trang login và authenticate)
// if (!in_array($action, ['login', 'authenticate']) && !isset($_SESSION['user_logged'])) {
//     header('Location: ' . BASE_URL . '?action=login');
//     exit();
// }

match ($action) {
    'login' => (new AuthController)->login(),
    'authenticate' => (new AuthController)->authenticate(),
    'logout' => (new AuthController)->logout(),
    '/'         => (new HomeController)->index(),
    'show-product'     => (new DetailProductController)->getDetail(),

};