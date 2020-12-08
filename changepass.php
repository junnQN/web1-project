<?php
require_once 'init.php';
// xử lí logic ở đây                                                                                                            
$title = 'Đổi mật khẩu';
if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['reppass'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $reppass = $_POST['reppass'];


    if (!password_verify($oldpass, $currentUser[0]['password'])) {
        $error =  'Mật khẩu cũ nhập không chính xác, đảm bảo đã tắt caps lock.';
    } else if ($newpass != $reppass) {
        $error = 'Nhập lại mật khẩu mới không khớp, đảm bảo đã tắt caps lock.';
    } else {
        $new = password_hash($newpass, PASSWORD_DEFAULT);
        changePassword($new, $currentUser[0]['id']);
        
        echo 'Password changed';
    }

    /*  else {
        if (!password_verify($password, $user[0]['password'])) {
            $error = 'Mật khẩu không chính xác';
        } else {
            //gán user vào session
            $_SESSION['userId'] = $user[0]['id'];
            header('Location: index.php');
            exit();
        }
    } */
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
                <label for="oldpass">Mật khẩu cũ</label>
                <input type="password" class="form-control" id="oldpass" name="oldpass">
            </div>
            <div class="form-group">
                <label for="newpass">Mật khẩu mới</label>
                <input type="password" class="form-control" id="newpass" name="newpass">
            </div>
            <div class="form-group">
                <label for="reppass">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="reppass" name="reppass">
            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </form>
    </div>

<?php endif; ?>


<?php include 'footer.php'; ?>