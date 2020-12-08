<?php
require_once 'init.php';
$title = 'Reset Password';

$code = $_GET['code'];
$id = $_GET['id'];
$user = findUserById($id);


if ($user) {
    if ($user[0]['code']) {
        if ($user[0]['code'] == $code) {
            $newpassword = '123456';
            changePassword(password_hash($newpassword, PASSWORD_DEFAULT), $id);
            header('Location: login.php');
        } else {
            $error = 'Mã kích hoạt không hợp lệ';
        }
    } else {
        $error = 'Mật khẩu đã được reset';
    }
} else {
    $error = 'Tài khoản không tồn tại';
}

?>

<?php include 'header.php'; ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>