<nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>">
                    <img src="<?= BASE_ASSETS_UPLOADS ?>pikachu.png" alt="" width="50">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>" class="nav-link">Tất cả</a>
                    </li>
                    <?php foreach($categories as $cat): ?>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>?category_id=<?= $cat['id'] ?>" class="nav-link"><?= $cat['name'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>                
            </div>
             <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_logged'])): ?>
                <li class="nav-item">
                    <a href="" class="nav-link">Xin chào <?= $_SESSION['user']['username'] ?? 'User' ?></a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?mode=admin" class="nav-link">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?action=logout" class="nav-link">Đăng xuất</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?action=login" class="nav-link">Đăng nhập</a>
                </li>
                <?php endif; ?>
            </ul>       
        </div>
    </nav>
    <!-- Hết header -->
    <!-- Khu vực nội dung -->
    <div class="container">
    <!-- Slideshow -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= BASE_ASSETS_UPLOADS ?>slide1.png" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="<?= BASE_ASSETS_UPLOADS ?>slide2.png" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="<?= BASE_ASSETS_UPLOADS ?>slide3.png" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
      <?php if (!empty($products)): ?>
      <h3 class="mt-3">Sản phẩm theo danh mục</h3>
      <div class="row">
        <?php foreach($products as $pro): ?>
        <div class="col-3">
            <div class="border rounded overflow-hidden mb-3">
                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                    <img src="<?= BASE_ASSETS_UPLOADS . $pro['img'] ?>" alt="" class="mw-100 mh-100">
                </div>
                <div class="p-2">
                    <a href="<?=BASE_URL . '?action=show-product&id=' . $pro["id"] ?>" ><h5><?= $pro["name"] ?></h5></a>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold text-danger"><?= $pro["price"] ?></span>
                        <button class="btn btn-danger btn-sm rounded-pill">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
      <h3 class="mt-3">Sản phẩm mới</h3>
      <div class="row">
        <?php foreach($top4Latest as $pro): ?>
        <div class="col-3">
            <div class="border rounded overflow-hidden mb-3">
                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                    <img src="<?= BASE_ASSETS_UPLOADS . $pro['img'] ?>" alt="" class="mw-100 mh-100">
                </div>
                <div class="p-2">
                    <a href="<?=BASE_URL . '?action=show-product&id=' . $pro["id"] ?>" ><h5><?= $pro["name"] ?></h5></a>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold text-danger"><?= $pro["price"] ?></span>
                        <button class="btn btn-danger btn-sm rounded-pill">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      </div>

      <h3 class="mt-3">Sản phẩm được xem nhiều nhất</h3>
      <div class="row">
        <?php foreach($top4View as $pro): ?>
        <div class="col-3">
            <div class="border rounded overflow-hidden mb-3">
                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                    <img src="<?= BASE_ASSETS_UPLOADS . $pro['img'] ?>" alt="" class="mw-100 mh-100">
                </div>
                <div class="p-2">
                    <a href="<?=BASE_URL . '?action=show-product&id=' . $pro["id"] ?>" ><h5><?= $pro["name"] ?></h5></a>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold text-danger"><?= $pro["price"] ?></span>
                        <button class="btn btn-danger btn-sm rounded-pill">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>