<?php
require_once "libData/DataSource.php";
$db = new DataSource();
?>
<div class="container">
    <div class="title">
        <a href="#" class="h2">Sản phẩm đã yêu thích</a>
    </div>
    <div class="row">
        <?php
        $idUser = $_SESSION["MaTaiKhoan"];
        $query = "SELECT * FROM yeuthichsanpham JOIN sanpham ON sanpham.MaSanPham = yeuthichsanpham.id_sanpham and yeuthichsanpham.id_user = '$idUser' ";
        $whish_array = $db->select($query);
        if (!empty($whish_array)) {
            foreach ($whish_array as $key => $value) {
        ?>
                <div class="col">
                    <div class="card product-item">
                        <img class="card-img-top" src="images/<?php echo $whish_array[$key]["HinhURL"] ?>" alt="<?php echo $product_array[$key]["MoTa"]; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $whish_array[$key]["TenSanPham"]; ?></h4>
                            <p class="card-text"><b>Giá: <span class="text-danger"><?php echo $whish_array[$key]["GiaSanPham"]; ?>đ</span></b></p>
                            <a href="index.php?a=8&id=<?php echo $whish_array[$key]["MaSanPham"]; ?>" class="btn btn-primary">CHI TIẾT</a>
                            <span data-pid="<?php echo $whish_array[$key]["id_sanpham"]; ?>" class="heart" onclick="removeFromWishlist(this)" title="Add to wish list"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart color-filled">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                                <img src="images/loading.gif" id="loader">
                            </span>
                            <span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</span>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>