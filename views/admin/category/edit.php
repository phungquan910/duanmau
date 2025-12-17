<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=update-category&id=<?= $category['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="name">Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="<?= $category['name'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $category['description'] ?? '' ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=index-category" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>