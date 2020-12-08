<?php
require_once 'init.php';
$title = 'Kích hoạt tài khoản';

$code = $_GET['code'];
$id = $_GET['id'];
$user = findUserById($id);

var_dump($_GET);

if ($user) {
    if ($user[0]['code']) {
        if ($user[0]['code'] == $code) {
            activateUser($id);
            $_SESSION['userId'] = $id;
            header('Location: index.php');
        } else {
            $error = 'Mã kích hoạt không hợp lệ';
        }
    } else {
        $error = 'Tài khoản đã kích hoạt';
    }
} else {
    $error = 'Tài khoản không tồn tại';
}

?>

<?php include 'header.php'; ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>