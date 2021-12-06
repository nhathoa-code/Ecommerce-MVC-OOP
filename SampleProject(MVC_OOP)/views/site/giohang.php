<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>

<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th></th>
                        <th>TÊN HH</th>
                        <th>ĐƠN GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TỔNG TIỀN</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $product) : extract($product); ?>
                        <tr class="cart-product" data-id="<?= $key ?>">
                            <td><img src="../content/images/products/<?= $hinh ?>" alt=""></td>
                            <td><?= $ten_hh ?></td>
                            <td>$<span class="don-gia"><?= number_format($don_gia, 1, ".", ",") ?></span></td>
                            <td>
                                <div class="so-luong-cart">
                                    <button <?php echo $so_luong <= 1 ? "disabled" : "" ?> class="btn-minus">-</button>
                                    <input class="quantity" readonly type="text" value="<?= $so_luong ?>">
                                    <button <?php echo $so_luong >= 5 ? "disabled" : "" ?> class="btn-plus">+</button>
                                </div>
                            </td>
                            <td>$<span class="tong-tien"><?php echo number_format($don_gia * $so_luong, 1, ".", ",") ?></span></td>
                            <td>
                                <a class="btn btn-outline-dark" href="./gio-hang-xoa?key=<?= $key ?>">Xóa</a>
                            </td>
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
            <div style="text-align: center;">
                <a class="btn btn-outline-dark" href="./dat-hang">ĐẶT HÀNG</a>
            </div>
        <?php else : ?>
            <h3 style="margin-top: 5rem;text-align:center">KHÔNG CÓ SẢN PHẨM TRONG GIỎ HÀNG</h3>
        <?php endif ?>

        <script>
            $("tr.cart-product").click(function(e) {
                let id = $(this).data("id");
                if (e.target.className == "btn-plus") {
                    $("tr[data-id=" + id + "] input.quantity").val(Number($("tr[data-id=" + id + "] input.quantity").val()) + 1);
                    let tong_tien = $("tr[data-id=" + id + "] input").val() * $("tr[data-id=" + id + "] span.don-gia").text();
                    $("tr[data-id=" + id + "] span.tong-tien").text(tong_tien.toFixed(1));
                    if ($("tr[data-id=" + id + "] input.quantity").val() == 5) {
                        $("tr[data-id=" + id + "] button.btn-plus").attr("disabled", "true");
                    }
                    if ($("tr[data-id=" + id + "] input.quantity").val() > 1) {
                        $("tr[data-id=" + id + "] button.btn-minus").removeAttr("disabled");
                    }
                }
                if (e.target.className == "btn-minus") {
                    $("tr[data-id=" + id + "] input.quantity").val(Number($("tr[data-id=" + id + "] input.quantity").val()) - 1);
                    let tong_tien = $("tr[data-id=" + id + "] input.quantity").val() * $("tr[data-id=" + id + "] span.don-gia").text();
                    $("tr[data-id=" + id + "] span.tong-tien").text(tong_tien.toFixed(1));
                    if ($("tr[data-id=" + id + "] input.quantity").val() == 1) {
                        $("tr[data-id=" + id + "] button.btn-minus").attr("disabled", "true");
                    }
                    if ($("tr[data-id=" + id + "] input.quantity").val() < 5) {
                        $("tr[data-id=" + id + "] button.btn-plus").removeAttr("disabled");
                    }
                }
                /*------ tinh tong gio hang ---------*/
                let subtotal = 0;
                $(".tong-tien").each(function(index, value) {
                    subtotal += parseFloat(value.innerText);
                })
                let cart_quantity = 0;
                $(".cart-product input.quantity").each(function(index, value) {
                    cart_quantity += parseInt(value.value);
                })
                $(".so-luong").text(cart_quantity);
                $("#sub-total").text(subtotal.toFixed(1));
                /*------- cap nhat gio hang ---------*/
                $.ajax({
                    url: "./gio-hang-cap-nhat",
                    method: "POST",
                    data: {
                        "action": "update_cart",
                        "key": id,
                        "plus-or-minus": e.target.className
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            })
        </script>
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