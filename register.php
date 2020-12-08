<?php
require_once 'init.php';
// xử lí logic ở đây
$title = 'Đăng kí';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $users = findUserByEmail($email);

    if ($users) {
        $error = 'Tên tài khoản đã có trong hệ thống';
    } else {
        $code = strtoupper(bin2hex(random_bytes(4)));
        $users = createUser($email,  password_hash($password, PASSWORD_DEFAULT), $code);
        sendEmail($email, 'Kích hoạt tài khoản', 'Vui lòng click vào link <a href="http:/localhost:83/BTCN07/activate.php?id=' . $users[0]['id'] . '&code=' . $code . '">Kích hoạt tài khoản</a>');
        //gán user vào session
        //$_SESSION['userId'] = $users[0]['id'];
        header('Location: login.php');
        exit();
    }
    /* if (isset($_POST['btnRegister'])) {
    $name = trim($_POST['nameDK']);
    $pass = trim($_POST['passDK']);

    if (!empty($name) && !empty($pass)) {
        $file = './data.txt';
        if (file_exists($file)) {
            $a = fopen($file, "a");
            fwrite($a, $name."|".$pass."\r\n");
            fclose($a);
        }
        $message =  'Thêm mới thành công!';
    } else {
        $error = 'Điền đầy đủ thông tin';
    }*/
}

?>

<?php include 'header.php'; ?>
<?php if (isset($message)) : ?>
    <div class="alert alert-primary container" role="alert">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<?php if (isset($error)) : ?>
    <div class="alert alert-danger container" role="alert">
        <?php echo $error; ?>
    </div>
<?php else : ?>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="passDK">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" value="register" name="btnRegister">Đăng kí</button>
        </form>
    </div>

<?php endif; ?>

<?php include 'footer.php'; ?>