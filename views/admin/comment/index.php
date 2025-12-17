<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800"><?= $title ?></h1>
        <a href="<?= BASE_URL_ADMIN ?>&action=create-comment" class="btn btn-success">
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
                            <th>Sản phẩm</th>
                            <th>Người dùng</th>
                            <th>Nội dung</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $comment): ?>
                            <tr>
                                <td><?= $comment['id'] ?></td>
                                <td><?= $comment['product_name'] ?? 'N/A' ?></td>
                                <td><?= $comment['username'] ?? 'Khách' ?></td>
                                <td><?= substr($comment['content'] ?? '', 0, 50) ?>...</td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>&action=edit-comment&id=<?= $comment['id'] ?>" 
                                       class="btn btn-success btn-sm">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN ?>&action=delete-comment&id=<?= $comment['id'] ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Chưa có bình luận nào</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>