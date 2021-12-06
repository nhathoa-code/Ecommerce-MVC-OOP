<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>
<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th></th>
                    <th>TÊN HH</th>
                    <th>ĐƠN GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG TIỀN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $key => $product) : extract($product); ?>
                    <tr class="cart-product" data-id="<?= $key ?>">
                        <td><img src="../content/images/products/<?= $hinh ?>" alt=""></td>
                        <td><?= $ten_hh ?></td>
                        <td>$<span class="don-gia"><?= number_format($don_gia, 1, ".", ",") ?></span></td>
                        <td><?= $so_luong ?></td>
                        <td>$<span class="tong-tien"><?php echo number_format($don_gia * $so_luong, 1, ".", ",") ?></span></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="sub">$<span id="sub-total"><?php
                                                        $subtotal = 0;
                                                        foreach ($_SESSION['cart'] as $product) {
                                                            extract($product);
                                                            $tong_product = $don_gia * $so_luong;
                                                            $subtotal += $tong_product;
                                                        }
                                                        echo number_format($subtotal, 1, ".", ",");
                                                        ?></span></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <form style="margin:2rem auto;width:60%" action="./don-hang-them" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập họ và tên*" name="ho_ten" value="<?php echo isset($validator) ? $validator->old("ho_ten") : "" ?>">
                <?php if (isset($error)) : ?>
                    <?php if ($error->has("ho_ten")) : ?>
                        <span class="error"><?= $error->first("ho_ten") ?></span>
                    <?php endif ?>
                <?php endif ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập số điện thoại*" name="sdt" value="<?php echo isset($validator) ? $validator->old("sdt") : "" ?>">
                <?php if (isset($error)) : ?>
                    <?php if ($error->has("sdt")) : ?>
                        <span class="error"><?= $error->first("sdt") ?></span>
                    <?php endif ?>
                <?php endif ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập email*" name="email" value="<?php echo isset($validator) ? $validator->old("email") : "" ?>">
                <?php if (isset($error)) : ?>
                    <?php if ($error->has("email")) : ?>
                        <span class="error"><?= $error->first("email") ?></span>
                    <?php endif ?>
                <?php endif ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng*" name="dia_chi" value="<?php echo isset($validator) ? $validator->old("dia_chi") : "" ?>">
                <?php if (isset($error)) : ?>
                    <?php if ($error->has("dia_chi")) : ?>
                        <span class="error"><?= $error->first("dia_chi") ?></span>
                    <?php endif ?>
                <?php endif ?>
            </div>

            <input type="hidden" name="tong_tien" value="<?php echo number_format($subtotal, 1, ".", ","); ?>">
            <button type="submit" class="btn btn-outline-dark mt-3">HOÀN TẤT ĐẶT HÀNG</button>
            <?php
            if (isset($_SESSION['loi-dang-nhap'])) {
                echo "<p style='color:red'>" . $_SESSION['loi-dang-nhap'] . "</p>";
                unset($_SESSION['loi-dang-nhap']);
            }
            ?>
        </form>

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