<?php
class ProductController 
{
    private $productModel;
    private $catModel;
    public function __construct() {
        $this->productModel = new Product();
        $this->catModel = new Category();
    }

    public function index () {
        $view = 'product/index';
        $title = 'Danh sách sản phẩm';
        $data = $this->productModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function delete() {
        // validate 
        try{
            if(!isset($_GET["id"])) {
                throw new Exception("Thiếu tham số id");
            }
            $id = $_GET["id"];
            // kiểm tra id có tồn tại không
            $pro = $this->productModel->find($id);
            if($pro) {
                // thực hiện xóa pro
                $this->productModel->delete($id);  
            } else {
                throw new Exception("Không có id = $id tồn tại!");
            }
            // chuyển trang nếu xóa thành công
            header('Location:' .BASE_URL_ADMIN. '&action=index-product');
            exit();
        } catch(Exception $ex) {
            throw new Exception("Thao tác không thành công");
        }
    }

    //  Hiển thị form tạo mới
    public function create() {
        $view = 'product/create';
        $title = 'Tạo mới sản phẩm';
        $categories = $this->catModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu giữ liệu thêm mới
    public function store() {
        try {
            // Validate giữ liệu đầu vào
            // xử lý ảnh
            $data = $_POST + $_FILES;
            if ($data["img"]["size"] > 0){
                $data["img"] = upload_file('products', $data['img']);
            } else {
                $data["img"] = null;
            }
            // Gọi tới model lưu vào CSDL
            $this->productModel->insert($data);
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=index-product');
        exit();
    }

    // Hiển thị chi tiết sản phẩm
    public function show() {
        if (!isset($_GET['id'])) {
            throw new Exception("Thiếu tham số id");
        }
        $id = $_GET['id'];
        $product = $this->productModel->find($id);
        if (!$product) {
            throw new Exception("Không tìm thấy sản phẩm");
        }
        $view = 'product/show';
        $title = 'Chi tiết sản phẩm';
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Hiển thị form chỉnh sửa
    public function edit() {
        if (!isset($_GET['id'])) {
            throw new Exception("Thiếu tham số id");
        }
        $id = $_GET['id'];
        $product = $this->productModel->find($id);
        if (!$product) {
            throw new Exception("Không tìm thấy sản phẩm");
        }
        $view = 'product/edit';
        $title = 'Chỉnh sửa sản phẩm';
        $categories = $this->catModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Cập nhật sản phẩm
    public function update() {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số id");
            }
            $id = $_GET['id'];
            $product = $this->productModel->find($id);
            if (!$product) {
                throw new Exception("Không tìm thấy sản phẩm");
            }
            
            $data = $_POST + $_FILES;
            if ($data["img"]["size"] > 0) {
                $data["img"] = upload_file('products', $data['img']);
            } else {
                $data["img"] = $product['img'];
            }
            
            $this->productModel->update($id, $data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-product');
            exit();
        } catch (Exception $th) {
            throw new Exception('Cập nhật không thành công');
        }
    }
}
?>