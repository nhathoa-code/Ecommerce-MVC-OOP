<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>
<?php
if (isset($message)) {
    echo "<h5 style='width:fit-content' class='alert alert-success'>$message</h5>";
    echo "<script>
            setTimeout(() => {
                document.getElementsByTagName('h5')[0].remove();
            }, 3000)
        </script>";
}
?>

<form action="./loai-hang-them" method="post">
    <div class="form-group">
        <label>Mã loại</label>
        <input name="ma_loai" value="auto number" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Tên loại</label>
        <input name="ten_loai" class="form-control" value="<?php echo isset($validator) ? $validator->old("ten_loai") : "" ?>">
        <?php if (isset($error)) : ?>
            <?php if ($error->has("ten_loai")) : ?>
                <span class="error"><?= $error->first("ten_loai") ?></span>
            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-dark">Thêm mới</button>
        <button type="reset" class="btn btn-outline-dark">Nhập lại</button>
        <a href="./loai-hang" class="btn btn-outline-dark">Danh sách</a>
    </div>
</form>
<?php require_once "../views/admin/layout/footer.php" ?>