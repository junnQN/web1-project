<?php
require_once 'init.php';

requireLoggedIn();
// xử lí logic ở đây
$title = 'Cá Nhân';
$currentUser = getCurrentuser(); 

if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    $newImage = resizeImage($file['tmp_name'], 250, 250);
    imagejpeg($newImage, './avatars/' . $currentUser[0]['id'] . '.jpg');
}
?>

<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
    <div class="alert alert-danger container" role="alert">
        <?php echo $error; ?>
    </div>
<?php else : ?>
    <div class="container">
        <img src="./avatars/<?php echo $currentUser[0]['id']; ?>.jpg">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" class="form-control-file" id="avatar" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhập</button>
        </form>
    </div>


<?php endif; ?>


<?php include 'footer.php'; ?>