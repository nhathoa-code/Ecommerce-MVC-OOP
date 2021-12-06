<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>

<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <div class="products-wrapper">
            <?php if (count($hanghoas) > 0) : ?>
                <div class="products-row">
                    <?php
                    foreach ($hanghoas as $hh) {
                    ?>
                        <div class="product">
                            <div>
                                <a href="./hang-hoa-chi-tiet?ma_hh=<?= $hh->ma_hh ?>">
                                    <img src="../content/images/products/<?= $hh->hinh ?>" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <p class="product-name">
                                    <a href="./hang-hoa-chi-tiet?ma_hh=<?= $hh->ma_hh ?>"><?= $hh->ten_hh ?></a>
                                </p>
                                <p class="product-price"> <span class="price">$<?= $hh->don_gia ?></span><a href="./hang-hoa-chi-tiet?ma_hh=<?= $hh->ma_hh ?>" class="mua-ngay">MUA NGAY</a></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if (isset($total_products)) : ?>
                    <?php if ($total_products > $limit) : ?>
                        <div style="text-align:center;margin-top:3rem">
                            <button data-products="<?= $limit ?>" class=" xem-them">XEM THÊM</button>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php else : ?>
                <h1 style="text-align:center">KHÔNG CÓ SẢN PHẨM</h1>
            <?php endif ?>

        </div>
        <script>
            <?php if (isset($total_products)) : ?>
                $(".xem-them").click(function() {
                    $(".xem-them").text("ĐANG TẢI");
                    $.ajax({
                        url: "./hang-hoa-tai",
                        method: "POST",
                        data: {
                            action: "hang-hoa-danh-sach",
                            ma_loai: <?= '"' . $maloai . '"' ?>,
                            total_products: <?= $total_products ?>,
                            limit: <?= $limit ?>,
                            start: $(this).data("products")
                        },
                        success: function(data) {
                            let fetched_products = $(".xem-them").data("products") + <?= $limit ?>;
                            $(".products-row").append(data);
                            $(".xem-them").attr("data-products", fetched_products);
                            $(".xem-them").data("products", fetched_products);
                            if (<?= $total_products ?> <= fetched_products) {
                                $(".xem-them").remove();
                            } else {
                                $(".xem-them").text("XEM THÊM");
                            }
                        },
                        error: function(message) {
                            console.log(message);
                        }
                    })
                })
            <?php endif ?>
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