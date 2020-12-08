<?php
require_once 'init.php';

// xử lí logic ở đây
$title = 'Thêm trạng thái mới';
if (isset($_POST['trangthai'])) {
    $trangthai = $_POST['trangthai'];
    createTrangThaiUser($trangthai, $currentUser[0]['id']);
    header('Location: index.php');
    exit();
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
                <label for="trangthai"></label>
                <input type="text" class="form-control" id="trangthai" name="trangthai" placeholder="Bạn đang nghĩ gì ?">
            </div>
            <button type="submit" class="btn btn-primary">Đăng</button>
        </form>
    </div>

<?php endif; ?>


<?php include 'footer.php'; ?>