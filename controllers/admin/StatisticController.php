<?php
class StatisticController {
    private $productModel;
    private $userModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->userModel = new User();
        $this->categoryModel = new Category();
    }

    public function index() {
        $view = 'statistic/index';
        $title = 'Thống kê';
        
        $totalProducts = $this->productModel->count();
        $totalUsers = $this->userModel->count();
        $totalCategories = $this->categoryModel->count();
        
        require_once PATH_VIEW_ADMIN_MAIN;
    }
}
?>