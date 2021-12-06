<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">CHI TIẾT BÌNH LUẬN</h3>
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
<form action="./binh-luan-xoa" method="get">
    <h3>HÀNG HÓA: <?= $ten_hh ?></h3>
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>NỘI DUNG</th>
                <th>NGÀY BL</th>
                <th>NGƯỜI BL</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
            ?>
                <tr>
                    <th><input type="checkbox" name="ma_bl[]" value="<?= $item->ma_bl ?>"></th>
                    <td><?= $item->noi_dung ?></td>
                    <td><?= $item->ngay_bl ?></td>
                    <td><?= $item->ma_kh ?></td>
                    <td>
                        <a href="./binh-luan-xoa?ma_bl=<?= $item->ma_bl ?>&ma_hh=<?= $item->ma_hh ?>">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button id="chon-tat-ca" class="btn btn-outline-dark mt-3" type="button">Chọn tất cả</button>
                    <button id="bo-chon" class="btn btn-outline-dark mt-3" type="button">Bỏ chọn tất cả</button>
                    <input type="hidden" name="ma_hh" value="<?= $item->ma_hh ?>">
                    <button class="btn btn-outline-dark mt-3" name="action" value="act_delete">Xóa các mục chọn</button>
                </td>
            </tr>
        </tfoot>
    </table>
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