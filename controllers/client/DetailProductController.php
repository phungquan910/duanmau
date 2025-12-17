<?php
class DetailProductController {
    private $productModel;

    public function __construct(){
        $this->productModel = new Product();
    }

    public function getDetail(){
        try{
            $view = 'detail_product';
            $title = 'chi tiết sản phẩm';
            if(!isset($_GET['id'])){
                throw new Exception('không tồn tại sản phẩm');
            }else{
                $id = $_GET['id'];
                $pro = $this->productModel->find($id);
                if (!empty($pro)) {
                    $view_count = $pro['view_count'] + 1;
                    $this->productModel->updateViewCount($id, $view_count);
                }else{
                    throw new Exception('không tồn tại sản phẩm');
                }
                require_once PATH_VIEW_CLIENT_MAIN;
            }
        }catch (Exception $ex){
            throw new Exception("có lỗi sảy ra");
        }
    }

}
?>