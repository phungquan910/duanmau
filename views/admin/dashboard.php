<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard - Tổng quan hệ thống</h1>
    
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">150</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Tổng danh mục</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tổng bình luận</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">42</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Truy cập nhanh</h6>
                </div>
                <div class="card-body">
                    <a href="<?= BASE_URL_ADMIN ?>&action=index-product" class="btn btn-primary btn-block mb-2">
                        <i class="fas fa-box"></i> Quản lý sản phẩm
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=index-category" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-list"></i> Quản lý danh mục
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=index-user" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-users"></i> Quản lý tài khoản
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=index-comment" class="btn btn-warning btn-block mb-2">
                        <i class="fas fa-comments"></i> Quản lý bình luận
                    </a>
                    <a href="<?= BASE_URL ?>" class="btn btn-secondary btn-block">
                        <i class="fas fa-home"></i> Xem trang chủ Client
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin hệ thống</h6>
                </div>
                <div class="card-body">
                    <p><strong>Phiên bản:</strong> 1.0.0</p>
                    <p><strong>Ngày cập nhật:</strong> <?= date('d/m/Y') ?></p>
                    <p><strong>Trạng thái:</strong> <span class="badge badge-success">Hoạt động</span></p>
                    <p><strong>Admin:</strong> <?= $_SESSION['admin_user']['username'] ?? 'Administrator' ?></p>
                </div>
            </div>
        </div>
    </div>
</div>