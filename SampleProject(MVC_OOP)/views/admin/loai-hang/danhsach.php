<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>
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
<form action="./loai-hang-xoa" method="get">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $item) {
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_loai[]" value="<?= $item->ma_loai ?>">
                    </td>
                    <td><?= $item->ma_loai ?></td>
                    <td><?= $item->ten_loai ?></td>
                    <td>
                        <a href="./loai-hang-xoa?ma_loai=<?= $item->ma_loai ?>" class="btn btn-outline-dark btn-sm">Xóa</a>
                        <a href="./loai-hang-sua-form?ma_loai=<?= $item->ma_loai ?>" class="btn btn-outline-dark btn-sm">Sữa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <button id="chon-tat-ca" class="btn btn-outline-dark">Chọn tất cả</button>
                    <button id="bo-chon" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
                    <button type="submit" class="btn btn-outline-dark">Xóa các mục chọn</button>
                    <a href="./loai-hang-them-form" class="btn btn-outline-dark">Nhập thêm</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<script>
    $("#chon-tat-ca").click(function(event) {
        event.preventDefault();
        $("input[type=checkbox").prop("checked", true);
    })
    $("#bo-chon").click(function(event) {
        event.preventDefault();
        $("input[type=checkbox]").prop("checked", false);
    })
</script>
<?php require_once "../views/admin/layout/footer.php" ?>