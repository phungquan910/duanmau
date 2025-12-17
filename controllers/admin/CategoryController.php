<?php
class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function index() {
        $view = 'category/index';
        $title = 'Quản lý danh mục';
        $data = $this->categoryModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create() {
        $view = 'category/create';
        $title = 'Tạo mới danh mục';
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store() {
        try {
            $data = $_POST;
            $this->categoryModel->insert($data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-category');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $category = $this->categoryModel->find($id);
        $view = 'category/edit';
        $title = 'Chỉnh sửa danh mục';
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function update() {
        try {
            $id = $_GET['id'];
            $data = $_POST;
            $this->categoryModel->update($id, $data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-category');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            $this->categoryModel->delete($id);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-category');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }
}
?>