<h4 style="margin:2rem 0">CÁC SẢN PHẢM CÙNG LOẠI</h4>
<div class="products-row">
    <?php
    foreach ($hh_cung_loai as $hh) {
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