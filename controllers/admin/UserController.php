<?php
class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $view = 'user/index';
        $title = 'Quản lý tài khoản';
        $data = $this->userModel->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create() {
        $view = 'user/create';
        $title = 'Tạo mới tài khoản';
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store() {
        try {
            $data = $_POST;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->insert($data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-user');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $user = $this->userModel->find($id);
        $view = 'user/edit';
        $title = 'Chỉnh sửa tài khoản';
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function update() {
        try {
            $id = $_GET['id'];
            $data = $_POST;
            if (!empty($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            } else {
                unset($data['password']);
            }
            $this->userModel->update($id, $data);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-user');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            $this->userModel->delete($id);
            header('Location: ' . BASE_URL_ADMIN . '&action=index-user');
            exit();
        } catch (Exception $th) {
            die('Lỗi: ' . $th->getMessage());
        }
    }
}
?>