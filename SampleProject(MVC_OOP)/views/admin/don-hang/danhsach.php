<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ ĐƠN HÀNG</h3>
<?php
if (isset($_SESSION['message'])) {
    echo "<h5 style='width:fit-content' class='alert alert-success'>" . $_SESSION['message'] . "</h5>";
    unset($_SESSION['message']);
    echo "<script>
            setTimeout(() => {
                document.getElementsByTagName('h5')[0].remove();
            }, 3000)
        </script>";
}
?>
<form action="./don-hang-xoa" method="get">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>MÃ ĐH</th>
                <th>MÃ KH</th>
                <th>TỔNG TIỀN</th>
                <th>NGÀY TẠO</th>
                <th>TRẠNG THÁI</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $don_hang) :
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_dh[]" value="<?= $don_hang->ma_dh ?>">
                    </td>
                    <td><?= $don_hang->ma_dh ?></td>
                    <td><?= $don_hang->ma_kh ?></td>
                    <td>$<?= $don_hang->tong_tien ?></td>
                    <td><?= $don_hang->ngay_tao ?></td>
                    <td><?= $don_hang->trang_thai ?></td>
                    <td><a href="./don-hang-chi-tiet?ma_dh=<?= $don_hang->ma_dh ?>" class="btn btn-outline-dark">Chi tiết</a></td>
                    <td><a class="btn btn-outline-dark" href="./don-hang-xoa?ma_dh=<?= $don_hang->ma_dh ?>">Xóa</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <button id="chon-tat-ca" class="btn btn-outline-dark">Chọn tất cả</button>
    <button id="bo-chon" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-outline-dark">Xóa các mục chọn</button>
</form>
<script>
    $("#chon-tat-ca").click(function(event) {
        event.preventDefault();
        $("input[type=checkbox]").prop("checked", true);
    })
    $("#bo-chon").click(function(event) {
        event.preventDefault();
        $("input[type=checkbox]").prop("checked", false);
    })
</script>
<?php require_once "../views/admin/layout/header.php" ?>