<?php
require_once 'init.php';
require_once 'functions.php';

requireLoggedIn();

// xử lí logic ở đây
$title = 'Cộng hai số';

/* $currentUser = getCurrentuser(); */



if (isset($_POST['number1']) && isset($_POST['number2'])) {
    $a = $_POST['number1'];
    $b = $_POST['number2'];
    if ($a == null || $b == null) {
        $error = 'Error: Không được để trống phần nhập';
    } else {
        $result = $a + $b;
    }
}
?>
<?php include 'header.php'; ?>
<?php if (isset($error)) : ?>
    <div class="alert alert-primary container" role="alert">
        <?php echo $error; ?>
    </div>
<?php else : ?>

    <?php if (isset($result)) : ?>
        <div class="alert alert-primary container" role="alert">
            Kết quả cộng hai số <?php echo $a; ?> và <?php echo $b; ?> là <?php echo $result; ?>
        </div>
    <?php else : ?>
        <div class="container">
            <form action="sum.php" method="POST">
                <div class="form-group">
                    <label for="number1">Số thứ nhất</label>
                    <input type="number" class="form-control" id="number1" name="number1">
                </div>
                <div class="form-group">
                    <label for="number2">Số thứ hai</label>
                    <input type="number" class="form-control" id="number2" name="number2">
                </div>
                <button type="submit" class="btn btn-primary">Gửi dữ liệu</button>
            </form>
        </div>

    <?php endif; ?>
<?php endif; ?>
<?php include 'footer.php'; ?>