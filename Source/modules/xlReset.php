<?php
ob_start();
session_start();

require_once '../vendor/autoload.php';
include "../lib/DataProvider.php";
include "../middleware/function.php";

if (isset($_POST["mail"]) && isset($_POST["passNew"]) && isset($_POST["rePassNew"]) && isset($_POST["username"])) {
    $passNew = $_POST["passNew"];
    $rePassNew = $_POST["rePassNew"];
    $email = $_POST["mail"];
    $username = $_POST["username"];


    $code = strtoupper(bin2hex(random_bytes(4)));
    $passHashUser = password_hash($passNew, PASSWORD_DEFAULT);
    echo $passHashUser;

    /* $sql = "SELECT * from taikhoan where TenDangNhap = '$username'";
    $resultUser = DataProvider::ExecuteQuery($sql);
    $user = mysqli_fetch_array($resultUser);

    if ($user == null) {
        $_SESSION["errorReset"] = 'Tên tài khoản không tồn tại trong hệ thống';
        header('Location: http://localhost:8080/LTW1_DoAn-master/Source/index.php?a=6&sub=3');
        exit();
    } else {
        if ($user["Email"] != $email) {
            $_SESSION["errorReset"] = 'Địa chỉ mail không hợp lệ';
            header('Location: http://localhost:8080/LTW1_DoAn-master/Source/index.php?a=6&sub=3');
            exit();
        } else if ($passNew != $rePassNew) {
            $_SESSION["errorPass"] = "Mật khẩu không khớp vui lòng nhập lại.";
            header('Location: http://localhost:8080/LTW1_DoAn-master/Source/index.php?a=6&sub=3');
            exit();
        } else {


            $sql = "UPDATE taikhoan set MatKhau = '$passHashUser' where TenDangNhap = '$username' ";
            DataProvider::ExecuteQuery($sql);

            // sendEmail($email, 'Reset mật khẩu', 'Vui lòng click vào link <a href="http:/localhost:8080/LTW1_DoAn-master/Source/middleware/activeCode.php?TenDangNhap=' . $username . '&code=' . $code . '">Reset mật khẩu</a>');

            $_SESSION['resetPassWork'] = 'Vui lòng reset mật khẩu thông qua email: ' . $passHashUser . ' vừa nhập.';
            header('Location: http://localhost:8080/LTW1_DoAn-master/Source/index.php?a=6&sub=1');
            exit();
        }
    } */
}
ob_flush();
