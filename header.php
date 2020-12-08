<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Lập trình web 1</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo $title == 'Trang chủ' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Trang chủ <?php echo $title == 'Trang chủ' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </li>
                    <li class="nav-item <?php echo $title == 'Cộng hai số' ? 'active' : ''; ?>">
                        <a class="nav-link" href="sum.php">Tính tổng <?php echo $title == 'Cộng hai số' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </li>
                    <?php if ($currentUser) : ?>
                        <!-- Đã đăng nhập -->
                        <li class="nav-item <?php echo $title == 'Thêm trạng thái mới' ? 'active' : ''; ?>">
                            <a class="nav-link" href="posttrangthai.php">Thêm trạng thái mới <?php echo $title == 'Thêm trạng thái mới' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                        </li>
                        <li class="nav-item <?php echo $title == 'Cá nhân' ? 'active' : ''; ?>">
                            <a class="nav-link" href="profile.php">Cá nhân <?php echo $title == 'Cá nhân' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                        </li>
                        <li class="nav-item <?php echo $title == 'Đổi mật khẩu' ? 'active' : ''; ?>">
                            <a class="nav-link" href="changepass.php">Đổi mật khẩu <?php echo $title == 'Đổi mật khẩu' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Đăng xuất</a>
                        </li>
                    <?php else : ?>
                        <!-- Chưa đăng nhập -->
                        <li class="nav-item <?php echo $title == 'Đăng kí' ? 'active' : ''; ?>">
                            <a class="nav-link" href="register.php">Đăng kí <?php echo $title == 'Đăng kí' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                        </li>
                        <li class="nav-item <?php echo $title == 'Đăng nhập' ? 'active' : ''; ?>">
                            <a class="nav-link" href="login.php">Đăng nhập <?php echo $title == 'Đăng nhập' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                        </li>

                    <?php endif; ?>


                </ul>
            </div>
        </nav>
        <h1><?php echo $title; ?></h1>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>