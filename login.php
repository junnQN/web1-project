<?php
require_once 'init.php';

// xử lí logic ở đây
$title = 'Đăng nhập';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user = findUserByEmail($email);


    if (!$user) {
        $error = 'Không tìm thấy người dùng';
    } else {
        if (!password_verify($password, $user[0]['password'])) {
            $error = 'Mật khẩu không chính xác';
        } else {
            //gán user vào session
            $_SESSION['userId'] = $user[0]['id'];
            header('Location: index.php');
            exit();
        }
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
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <button type="button" class="btn btn-outline-secondary"><a style="text-decoration:none" href="forgotpass.php">Quên mật khẩu</a></button>


        </form>
    </div>

<?php endif; ?>


<?php include 'footer.php'; ?>