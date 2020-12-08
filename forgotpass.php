<?php
require_once 'init.php';

// xử lí logic ở đây
$title = 'Quên mật khẩu';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $users = findUserByEmail($email);


    if ($users) {
        $code = strtoupper(bin2hex(random_bytes(4)));
        resetPassword($code, $users[0]['id']);
        sendEmail($email, 'Reset Password', 'Vui lòng click vào link <a href="http:/localhost:83/BTCN07/resetpass.php?id=' . $users[0]['id'] . '&code=' . $code . '">Reset Password</a>');
        //gán user vào session
        //$_SESSION['userId'] = $users[0]['id'];

    } else {
        $error = 'Email không tồn tại trong hệ thống';
    }
}
?>

<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
    <div class="alert alert-danger container" role="alert">
        <?php echo $error; ?>
    </div>
<?php else : ?>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="email">Email Reset</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

<?php endif; ?>


<?php include 'footer.php'; ?>