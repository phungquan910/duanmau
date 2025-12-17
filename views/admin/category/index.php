<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800"><?= $title ?></h1>
        <a href="<?= BASE_URL_ADMIN ?>&action=create-category" class="btn btn-success">
            Tạo mới
        </a>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $category): ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td><?= $category['description'] ?? '' ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>&action=edit-category&id=<?= $category['id'] ?>" 
                                   class="btn btn-success btn-sm">Sửa</a>
                                <a href="<?= BASE_URL_ADMIN ?>&action=delete-category&id=<?= $category['id'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>