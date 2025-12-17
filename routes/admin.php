<?php
// Route xử lý các action cho admin
$action = $_GET['action'] ?? '/';

// Kiểm tra đăng nhập (trừ trang login và authenticate)
// if (!in_array($action, ['login', 'authenticate']) && !isset($_SESSION['admin_logged'])) {
//     header('Location: ' . BASE_URL_ADMIN . '&action=login');
//     exit();
// }

match ($action) {
    'login' => (new AuthController)->login(),
    'authenticate' => (new AuthController)->authenticate(),
    'logout' => (new AuthController)->logout(),
    '/'         => (new DashboardController)->index(),
    
    // CRUD PRODUCT
    'index-product' => (new ProductController)->index(), // Hiển thị danh sách
    'show-product' => (new ProductController)->show(), // Hiển thị chi tiết
    'delete-product' => (new ProductController)->delete(), // Xóa
    'create-product' => (new ProductController)->create(), // Hiển thị form tạo mới
    'store-product' => (new ProductController)->store(), // Lưu dữ liệu trên form vào CSDL
    'edit-product' => (new ProductController)->edit(), // Hiển thị form
    'update-product' => (new ProductController)->update(), // Lưu dữ liệu cần cập nhật vào CSDL
    
    // Thống kê
    'thong-ke' => (new StatisticController)->index(),
    
    // CRUD CATEGORY
    'index-category' => (new CategoryController)->index(),
    'create-category' => (new CategoryController)->create(),
    'store-category' => (new CategoryController)->store(),
    'edit-category' => (new CategoryController)->edit(),
    'update-category' => (new CategoryController)->update(),
    'delete-category' => (new CategoryController)->delete(),
    
    // CRUD USER
    'index-user' => (new UserController)->index(),
    'create-user' => (new UserController)->create(),
    'store-user' => (new UserController)->store(),
    'edit-user' => (new UserController)->edit(),
    'update-user' => (new UserController)->update(),
    'delete-user' => (new UserController)->delete(),
    
    // CRUD COMMENT
    'index-comment' => (new CommentController)->index(),
    'create-comment' => (new CommentController)->create(),
    'store-comment' => (new CommentController)->store(),
    'edit-comment' => (new CommentController)->edit(),
    'update-comment' => (new CommentController)->update(),
    'delete-comment' => (new CommentController)->delete(),
};

?>