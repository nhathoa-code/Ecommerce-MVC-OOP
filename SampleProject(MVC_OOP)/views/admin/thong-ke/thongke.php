<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h3>
<table class="table">
    <thead class="alert-success">
        <tr>
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($items as $item) {
        ?>
            <tr>
                <td><?= $item->ten_loai ?></td>
                <td><?= $item->so_luong ?></td>
                <td>$<?= number_format($item->gia_min, 2) ?></td>
                <td>$<?= number_format($item->gia_max, 2) ?></td>
                <td>$<?= number_format($item->gia_avg, 2) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="./bieu-do-thong-ke">Xem biểu đồ</a>
<?php require_once "../views/admin/layout/header.php" ?>