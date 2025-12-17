<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=store-comment" method="POST">
                <div class="form-group">
                    <label for="product_id">Sản phẩm <span class="text-danger">*</span></label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        <option value="">Chọn sản phẩm</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="user_id">Người dùng <span class="text-danger">*</span></label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">Chọn người dùng</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="rating">Đánh giá</label>
                    <select class="form-control" id="rating" name="rating">
                        <option value="5">5 sao</option>
                        <option value="4">4 sao</option>
                        <option value="3">3 sao</option>
                        <option value="2">2 sao</option>
                        <option value="1">1 sao</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="content">Nội dung <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=index-comment" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>