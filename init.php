<?php
// Khởi tạo session
session_start();

//composer autoload
require_once './vendor/autoload.php';
// thêm thông báo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//kết nối cơ sở dữ liệu
$db = new PDO('mysql:host=sql200.epizy.com;dbname=epiz_27357944_khachhang;charset=utf8', 'epiz_27357944', 'C7YAoLJbX0Ox0EJ');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'functions.php';


// lấy thông tin user đã đăng nhập
$currentUser = getCurrentUser();
