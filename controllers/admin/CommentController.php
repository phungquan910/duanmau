<?php
class CommentController {
    private $commentModel;

    public function __construct() {
        $this->commentModel = new Comment();
    }

    public function index() {
        $view = 'comment/index';
        $title = 'Quản lý bình luận';
        $data = $this->commentModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create() {
        $productModel = new Product();
        $userModel = new User();
        $view = 'comment/create';
        $title = 'Tạo mới bình luận';
        $products = $productModel->getAll();
        $users = $userModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store() {
        try {
            $data = $_POST;
            $this->commentModel->insert($data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-comment');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function edit() {
        $productModel = new Product();
        $userModel = new User();
        $id = $_GET['id'];
        $comment = $this->commentModel->find($id);
        $view = 'comment/edit';
        $title = 'Chỉnh sửa bình luận';
        $products = $productModel->getAll();
        $users = $userModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function update() {
        try {
            $id = $_GET['id'];
            $data = $_POST;
            $this->commentModel->update($id, $data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-comment');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            $this->commentModel->delete($id);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-comment');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }
}
?>