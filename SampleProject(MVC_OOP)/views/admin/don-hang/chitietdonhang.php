<?php require_once "../views/admin/layout/header.php" ?>
<p>Số đơn hàng:<span><?= $don_hang->ma_dh ?></span></p>
<p>Tổng tiền đơn hàng:<span>$<?= $don_hang->tong_tien ?></span></p>
<p>Trạng thái:<span><?= $don_hang->trang_thai ?></span></p>
<hr>
<p>Họ tên:<span><?= $don_hang->ho_ten ?></span></p>
<p>Địa chỉ:<span><?= $don_hang->dia_chi ?></span></p>
<p>Email:<span><?= $don_hang->email ?></span></p>
<p>Số điện thoại:<span><?= $don_hang->so_dien_thoai ?></span></p>
<h5>Chi tiết đơn hàng</h5>
<table class="table border-">
    <thead class="alert-success">
        <tr>
            <th></th>
            <th>TÊN HH</th>
            <th>ĐƠN GIÁ</th>
            <th>SỐ LƯỢNG</th>
            <th>THÀNH TIỀN</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($items as $item) :
        ?>
            <tr>
                <td><img src="../content/images/products/<?= $item->hinh ?>" alt=""></td>
                <td><?= $item->ten_hh ?></td>
                <td>$<?= number_format($item->don_gia, 1, ".", ".") ?></td>
                <td><?= $item->so_luong ?></td>
                <td>$<?= number_format($item->thanh_tien, 1, ".", ".") ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php require_once "../views/admin/layout/header.php" ?>