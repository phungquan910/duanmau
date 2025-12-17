<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=update-user&id=<?= $user['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" 
                           value="<?= $user['username'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?= $user['email'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Mật khẩu mới (để trống nếu không đổi)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=index-user" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>