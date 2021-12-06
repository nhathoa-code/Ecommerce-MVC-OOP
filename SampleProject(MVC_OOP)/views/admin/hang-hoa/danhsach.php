<?php $_SESSION['back'] = $_SERVER['REQUEST_URI']  ?>
<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ HÀNG HÓA</h3>
<style>
    img {
        width: 100px;
        height: auto;
    }
</style>
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
<form action="./hang-hoa-xoa" method="get">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th></th>
                <th>TÊN HH</th>
                <th>ĐƠN GIÁ</th>
                <th>GIẢM GIÁ</th>
                <th>LƯỢT XEM</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $item) :
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_hh[]" value="<?= $item->ma_hh ?>">
                    </td>
                    <td>
                        <img src="<?php echo "../content/images/products/$item->hinh" ?>" alt="">
                    </td>
                    <td><?= $item->ten_hh ?></td>
                    <td>$<?= $item->don_gia ?></td>
                    <td><?= $item->giam_gia * 100 ?>%</td>
                    <td><?= $item->so_luot_xem ?></td>
                    <td><a class="btn btn-outline-dark mr-2" href="./hang-hoa-sua-form?ma_hh=<?= $item->ma_hh ?>">Sữa</a><a class="btn btn-outline-dark" href="./hang-hoa-xoa?ma_hh=<?= $item->ma_hh ?>">Xóa</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <button id="chon-tat-ca" class="btn btn-outline-dark">Chọn tất cả</button>
    <button id="bo-chon" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-outline-dark">Xóa các mục chọn</button>
    <a href="./hang-hoa-them-form" class="btn btn-outline-dark">Nhập thêm</a>
</form>
<?php if ($nav_page != "") : ?>
    <div class="page-nav">
        <?= $nav_page ?>
    </div>
<?php endif ?>

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
<?php require_once "../views/admin/layout/footer.php" ?>