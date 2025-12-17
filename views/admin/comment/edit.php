<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=update-comment&id=<?= $comment['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="product_id">Sản phẩm <span class="text-danger">*</span></label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        <option value="">Chọn sản phẩm</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>" <?= $product['id'] == $comment['product_id'] ? 'selected' : '' ?>>
                                <?= $product['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="user_id">Người dùng <span class="text-danger">*</span></label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">Chọn người dùng</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['id'] ?>" <?= $user['id'] == $comment['user_id'] ? 'selected' : '' ?>>
                                <?= $user['username'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="rating">Đánh giá</label>
                    <select class="form-control" id="rating" name="rating">
                        <option value="5" <?= ($comment['rating'] ?? 5) == 5 ? 'selected' : '' ?>>5 sao</option>
                        <option value="4" <?= ($comment['rating'] ?? 5) == 4 ? 'selected' : '' ?>>4 sao</option>
                        <option value="3" <?= ($comment['rating'] ?? 5) == 3 ? 'selected' : '' ?>>3 sao</option>
                        <option value="2" <?= ($comment['rating'] ?? 5) == 2 ? 'selected' : '' ?>>2 sao</option>
                        <option value="1" <?= ($comment['rating'] ?? 5) == 1 ? 'selected' : '' ?>>1 sao</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="content">Nội dung <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="4" required><?= $comment['content'] ?? '' ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=index-comment" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>