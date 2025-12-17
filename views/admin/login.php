<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error'] ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="<?= BASE_URL_ADMIN ?>&action=authenticate" id="loginForm">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                                <div class="invalid-feedback" id="usernameError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="invalid-feedback" id="passwordError"></div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const usernameError = document.getElementById('usernameError');
        const passwordError = document.getElementById('passwordError');
        
        let isValid = true;
        
        // Reset errors
        username.classList.remove('is-invalid');
        password.classList.remove('is-invalid');
        
        // Validate username
        if (!username.value.trim()) {
            username.classList.add('is-invalid');
            usernameError.textContent = 'Username không được để trống.';
            isValid = false;
        } else if (username.value.length < 3 || username.value.length > 30) {
            username.classList.add('is-invalid');
            usernameError.textContent = 'Độ dài Username phải nằm trong khoảng 3 đến 30 ký tự.';
            isValid = false;
        }
        
        // Validate password
        if (!password.value.trim()) {
            password.classList.add('is-invalid');
            passwordError.textContent = 'Password không được để trống.';
            isValid = false;
        } else if (password.value.length < 6 || password.value.length > 10) {
            password.classList.add('is-invalid');
            passwordError.textContent = 'Độ dài Password phải nằm trong khoảng 6 đến 10 ký tự.';
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    </script>
</body>
</html>