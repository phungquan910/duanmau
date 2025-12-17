<?php 
// File điểm vào chính của ứng dụng
session_start();

// Tự động load các class khi được gọi
spl_autoload_register(function ($class) {    
    $fileName = "$class.php";

    $fileModel              = PATH_MODEL . $fileName;
    // $fileController         = PATH_CONTROLLER . $fileName;
    $fileControllerClient    = PATH_CONTROLLER_CLIENT.$fileName;
    $fileControllerAdmin    = PATH_CONTROLLER_ADMIN.$fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } 
    else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    }
    else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});

// Load file cấu hình và helper
require_once './configs/env.php';
require_once './configs/helper.php';

// Điều hướng giữa admin và client
$mode = $_GET['mode'] ?? 'client';
if ($mode == 'admin') {
    require_once './routes/admin.php';
} else {
    require_once './routes/client.php';
}
