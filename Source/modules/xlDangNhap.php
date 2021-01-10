<?php
session_start();
include "../lib/DataProvider.php";
if (isset($_POST["txtUS"]) && isset($_POST["txtPS"])) {
    $us = $_POST["txtUS"];
    $ps = trim($_POST["txtPS"]);
    /*   (!password_verify($password, $user[0]['passUser'])) */
    $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$us' and BiXoa = '0' and code= '' ";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    if ($row == null) {
        $_SESSION["error"] = 'Tên tài khoản không khớp';
        header('Location: http://localhost:8080/LTW1_DoAn-master/Source/index.php?a=6&sub=1');
    } else {
        if (password_verify($ps, $row['MatKhau']) != true) {
            $_SESSION["error"] = 'Mật khẩu không khớp';
            header('Location: http://localhost:8080/web1-project/Source/index.php?a=6&sub=1');
        } else {
            $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
            $_SESSION["MaLoaiTaiKhoan"] = $row["MaLoaiTaiKhoan"];
            $_SESSION["DienThoai"] = $row["DienThoai"];
            $_SESSION["Email"] = $row["Email"];
            $_SESSION["DiaChi"] = $row["DiaChi"];
            $_SESSION["TenHienThi"] = $row["TenHienThi"];
            if ($row["MaLoaiTaiKhoan"] == 2) {
                DataProvider::ChangeURL("../admin/index.php");
            } else {
                DataProvider::ChangeURL("../index.php");
            }
        }
    }
}
