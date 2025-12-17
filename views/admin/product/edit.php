<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form chỉnh sửa sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=update-product&id=<?= $product['id'] ?>" 
                  method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="<?= $product['name'] ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="categories_id">Danh mục <span class="text-danger">*</span></label>
                            <select class="form-control" id="categories_id" name="categories_id" required>
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" 
                                            <?= $category['id'] == $product['categories_id'] ? 'selected' : '' ?>>
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Giá <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="price" name="price" 
                                   value="<?= $product['price'] ?>" min="0" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="quantity">Số lượng <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="quantity" name="quantity" 
                                   value="<?= $product['quantity'] ?>" min="0" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" 
                                      rows="5"><?= $product['description'] ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="img">Ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" id="img" name="img" 
                                   accept="image/*">
                            <?php if ($product['img']): ?>
                                <div class="mt-2">
                                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/' . $product['img'] ?>" 
                                         alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                    <p class="text-muted mt-1">Ảnh hiện tại</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật
                    </button>
                    <a href="<?= BASE_URL_ADMIN ?>&action=index-product" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>