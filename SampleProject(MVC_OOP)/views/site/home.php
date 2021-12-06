<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>

<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../content/images/products/340s-i5-xam.png" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="../content/images/products/340s-i5-xam.png" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="../content/images/products/340s-i5-xam.png" alt="New York">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <div class="background">
                    <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <div class="background">
                    <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
                </div>
            </a>
        </div>
        <div class="products-wrapper">
            <h3 style="margin-top: 2rem;margin-bottom:3rem">Sản phẩm đặc biệt</h3>
            <div class="products-row">
                <?php
                $limit = 0;
                foreach ($products as $product) :
                ?>

                    <div class="product">
                        <div>
                            <a href="./hang-hoa-chi-tiet?ma_hh=<?= $product->ma_hh ?>">
                                <img src="../content/images/products/<?= $product->hinh ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-name">
                                <a href="./hang-hoa-chi-tiet?ma_hh=<?= $product->ma_hh ?>"><?= $product->ten_hh ?></a>
                            </p>
                            <p class="product-price"> <span class="price">$<?= $product->don_gia ?></span><a href="./hang-hoa-chi-tiet?ma_hh=<?= $product->ma_hh ?>" class="mua-ngay">MUA NGAY</a></p>
                        </div>
                    </div>
                <?php
                    $limit++;
                    if ($limit == 9) break;
                endforeach;
                if (count($products) > 9) : ?>
                    <a href="">Xem tất cả sản phẩm đặc biệt</a>
                <?php endif ?>

            </div>
        </div>
        <script src="trangchu.js"></script>
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