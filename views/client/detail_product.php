<div class="col-12">
    <div class="row">
        <!-- Ảnh sản phẩm -->
        <div class="col-md-6">
            <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height: 500px;">
                <img src="<?= BASE_ASSETS_UPLOADS . $pro['img'] ?>" alt="<?= $pro['name'] ?>" class="mw-100 mh-100">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h2><?= $pro['name'] ?></h2>
            <hr>
            
            <div class="mb-3">
                <span class="text-muted">Lượt xem:</span>
                <span class="badge bg-secondary"><?= $pro['view_count'] ?? 0 ?></span>
            </div>

            <div class="mb-3">
                <h3 class="text-danger fw-bold"><?= number_format($pro['price']) ?> VNĐ</h3>
            </div>

            <div class="mb-3">
                <span class="text-muted">Số lượng còn:</span>
                <span class="fw-bold"><?= $pro['quantity'] ?></span>
            </div>

            <div class="mb-4">
                <h5>Mô tả sản phẩm:</h5>
                <p><?= nl2br($pro['description']) ?></p>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-danger btn-lg">Mua ngay</button>
                <button class="btn btn-outline-danger btn-lg">Thêm vào giỏ</button>
                <a href="<?= BASE_URL ?>" class="btn btn-secondary btn-lg">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div> 
