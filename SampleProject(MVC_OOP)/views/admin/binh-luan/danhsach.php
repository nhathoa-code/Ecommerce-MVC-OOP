<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">TỔNG HỢP BÌNH LUẬN</h3>
<form action="index.php" method="post">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th>HÀNG HÓA</th>
                <th>SỐ BL</th>
                <th>MỚI NHẤT</th>
                <th>CŨ NHẤT</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
            ?>
                <tr>
                    <td><?= $item->ten_hh ?></td>
                    <td><?= $item->so_luong ?></td>
                    <td><?= $item->cu_nhat ?></td>
                    <td><?= $item->moi_nhat ?></td>
                    <td>
                        <a href="./binh-luan-chi-tiet?ma_hh=<?= $item->ma_hh ?>">Chi tiết</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</form>
<?php require_once "../views/admin/layout/header.php" ?>