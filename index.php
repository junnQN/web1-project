<?php
require_once 'init.php';


// xử lí logic ở đây
$title = 'Trang chủ';

//$trangthaiUser = findTrangThaiById($currentUser[0]['id']);
//$slTrangthai = count($trangthaiUser);


?>
<?php include 'header.php'; ?>
<?php if ($currentUser) : ?>
    <div class="alert alert-success container" role="alert">
        Chào <?php echo $currentUser[0]['email']; ?>, chúc bạn một ngày tốt lành.
    </div>
    <div class="container">
        <!-- <?php for ($i = 0; $i < $slTrangthai; $i++) {; ?>
            <div class="card" style="width: 18rem; margin-bottom: 10px">
                <img src="./avatars/<?php echo $currentUser[0]['id']; ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $currentUser[0]['username']; ?></h5>
                    <p class="card-text"><?php echo $trangthaiUser[$i]['content']; ?></p>
                    <p class="card-text"><?php echo $trangthaiUser[$i]['createdAt']; ?></p>
                </div>
            </div>
        <?php }; ?> -->

    </div>

<?php else : ?>
    <div class="alert alert-secondary container" role="alert">
        Bạn chưa đăng nhập
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>