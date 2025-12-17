<?php

class HomeController
{   
    private $productModel;
    private $categoryModel;
    
    public function __construct(){
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() 
    {   
        $view = 'home';
        $categoryId = $_GET['category_id'] ?? null;
        
        if ($categoryId) {
            $products = $this->productModel->getByCategory($categoryId);
            $top4Latest = [];
            $top4View = [];
        } else {
            $products = [];
            $top4Latest = $this->productModel->getTop4Latest();
            $top4View = $this->productModel->getTop4View();
        }
        
        $categories = $this->categoryModel->getAll();
        require_once PATH_VIEW_CLIENT_MAIN;
    }
}