<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ KHÁCH HÀNG</h3>
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
<form action="./khach-hang-xoa" method="get">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>MÃ KH</th>
                <th>HỌ VÀ TÊN</th>
                <th>ĐỊA CHỈ EMAIL</th>
                <th>VAI TRÒ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $item) :
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_kh[]" value="<?= $item->ma_kh ?>">
                    </td>
                    <td><?= $item->ma_kh ?></td>
                    <td><?= $item->ho_ten ?></td>
                    <td><?= $item->email ?></td>
                    <td><?= $item->vai_tro ?></td>
                    <td><a class="btn btn-outline-dark mr-2" href="./khach-hang-sua-form?ma_kh=<?= $item->ma_kh ?>">Sữa</a><a class="btn btn-outline-dark" href="./khach-hang-xoa?ma_kh=<?= $item->ma_kh ?>">Xóa</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <button id="chon-tat-ca" class="btn btn-outline-dark">Chọn tất cả</button>
    <button id="bo-chon" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-outline-dark">Xóa các mục chọn</button>
    <a href="./khach-hang-them-form" class="btn btn-outline-dark">Nhập thêm</a>
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