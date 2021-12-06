<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>
<form action="./loai-hang-sua" method="post">
    <div class="form-group">
        <label>Mã loại</label>
        <input name="ma_loai" value="<?php echo isset($validator) ? $validator->old("ma_loai") : $item->ma_loai ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Tên loại</label>
        <input name="ten_loai" class="form-control" value="<?php echo isset($validator) ? $validator->old("ten_loai") : $item->ten_loai ?>">
        <?php if (isset($error)) : ?>
            <?php if ($error->has("ten_loai")) : ?>
                <span class="error"><?= $error->first("ten_loai") ?></span>
            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="form-group">
        <button name="action" value="act_update" class="btn btn-outline-dark">Cập nhật</button>
        <button type="reset" class="btn btn-outline-dark">Nhập lại</button>
        <a href="./loai-hang-them-form" class="btn btn-outline-dark">Thêm mới</a>
        <a href="./loai-hang" class="btn btn-outline-dark">Danh sách</a>
    </div>
</form>

<?php require_once "../views/admin/layout/header.php" ?>