<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?php if ($product['img']): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . 'products/' . $product['img'] ?>" 
                             alt="<?= $product['name'] ?>" class="img-fluid rounded">
                    <?php else: ?>
                        <div class="bg-light p-5 text-center rounded">
                            <i class="fas fa-image fa-3x text-muted"></i>
                            <p class="mt-2 text-muted">Không có ảnh</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">ID:</th>
                            <td><?= $product['id'] ?></td>
                        </tr>
                        <tr>
                            <th>Tên sản phẩm:</th>
                            <td><?= $product['name'] ?></td>
                        </tr>
                        <tr>
                            <th>Danh mục:</th>
                            <td><?= $product['categories_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Giá:</th>
                            <td><?= number_format($product['price']) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <th>Số lượng:</th>
                            <td><?= $product['quantity'] ?></td>
                        </tr>
                        <tr>
                            <th>Mô tả:</th>
                            <td><?= nl2br($product['description']) ?></td>
                        </tr>
                    </table>
                    
                    <div class="mt-3">
                        <a href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $product['id'] ?>" 
                           class="btn btn-warning">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        <a href="<?= BASE_URL_ADMIN ?>&action=index-product" 
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>