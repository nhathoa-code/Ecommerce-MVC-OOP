<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>
<link rel="stylesheet" href="../content/css/chitiet.css">
<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <div class="product-detail">
            <img src='../content/images/products/<?= $hang_hoa->hinh ?>'>
            <div class="product-info-detail">
                <p class="product-name-detail">
                    <?= $hang_hoa->ten_hh ?>
                </p>
                <p class="product-price-detail">
                    <?php
                    if ($hang_hoa->giam_gia != 0) {
                        $don_gia_moi = $hang_hoa->don_gia * (1 - $hang_hoa->giam_gia);
                    }
                    ?>
                    <?php if (isset($don_gia_moi)) : ?>
                        <span>$<?= $don_gia_moi ?></span> <span style="text-decoration: line-through;"> $<?= $hang_hoa->don_gia ?></span>
                    <?php else : ?>
                        <span>$<?= $hang_hoa->don_gia ?></span>
                    <?php endif ?>
                </p>
                <?php if (isset($_SESSION['cart']) && array_key_exists($hang_hoa->ma_hh, $_SESSION['cart'])) : ?>
                    <button style="background-color: #cb1c22;color:white" disabled class="add-to-cart btn btn-block">ĐÃ THÊM VÀO GIỎ HÀNG</button>
                <?php else : ?>
                    <button style="background-color: #cb1c22;color:white" data-id="<?= $hang_hoa->ma_hh ?>" class="add-to-cart btn btn-block">MUA NGAY</button>
                <?php endif ?>
            </div>
        </div>
        <h3 style="margin:3rem 0 1rem 0">Mô tả</h3>
        <div style="border-bottom:1px solid #282A35;padding-bottom:1rem;margin-bottom:1rem"><?= $hang_hoa->mo_ta ?></div>
        <?php include_once '../views/site/binhluan.php'; ?>
        <?php include_once '../views/site/hangcungloai.php'; ?>

        <script>
            $(".add-to-cart").click(function() {
                let ma_hh = $(this).data("id");
                $.ajax({
                    url: "./gio-hang-them",
                    method: "POST",
                    data: {
                        "ma_hh": ma_hh
                    },
                    success: function(data) {
                        $("button[data-id=" + ma_hh + "]").text("ĐÃ THÊM VÀO GIỎ HÀNG");
                        $("button[data-id=" + ma_hh + "]").attr("disabled", "true");
                        $(".so-luong").text(data);
                    },
                    error: function(message) {
                        console.log(message);
                    }
                })
            })
        </script>
        <!--        main-content         -->
    </div>
    <div class="rounded">
        <div class="border">
            <!--     tai khoan        -->
            <?php require '../views/site/layout/dang-nhap.php'; ?>
        </div>
        <div class="border mt-4">
            <!--     loai hang        -->
            <?php require '../views/site/layout/loai-hang.php'; ?>
        </div>
        <div class="border mt-4">
            <!--     top 10           -->
            <?php require '../views/site/layout/top10.php'; ?>
        </div>
    </div>
</div>

<?php include_once "../views/site/layout/footer.php" ?>