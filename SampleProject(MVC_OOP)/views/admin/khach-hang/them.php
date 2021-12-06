<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ KHÁCH HÀNG</h3>
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
<form action="./khach-hang-them" method="post">
    <div class=" row mb-4">
        <div class="col">
            <label>MÃ KHÁCH HÀNG</label>
            <input type="text" class="form-control" name="ma_kh" value="<?php echo isset($validator) ? $validator->old("ma_kh") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("ma_kh")) : ?>
                    <span class="error"><?= $error->first("ma_kh") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>HỌ VÀ TÊN</label>
            <input type="text" class="form-control" name="ho_ten" value="<?php echo isset($validator) ? $validator->old("ho_ten") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("ho_ten")) : ?>
                    <span class="error"><?= $error->first("ho_ten") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <label>MẬT KHẨU</label>
            <input type="password" class="form-control" name="mat_khau" value="<?php echo isset($validator) ? $validator->old("mat_khau") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("mat_khau")) : ?>
                    <span class="error"><?= $error->first("mat_khau") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>XÁC NHẬN MẬT KHẨU</label>
            <input type="password" class="form-control" name="mat_khau_confirmed" value="<?php echo isset($validator) ? $validator->old("mat_khau_confirmed") : "" ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <label>ĐỊA CHỈ EMAIL</label>
            <input type="text" class="form-control" name="email" value="<?php echo isset($validator) ? $validator->old("email") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("email")) : ?>
                    <span class="error"><?= $error->first("email") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>VAI TRÒ</label>
            <div class="form-check py-1">
                <label class="form-check-label mr-5">
                    <input type="radio" class="form-check-input" value="Khách hàng" <?php echo isset($validator) ? ($validator->old("vai_tro") == "Khách hàng" ? "checked" : "") : "" ?> name="vai_tro">Khách hàng
                </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Nhân viên" <?php echo isset($validator) ? ($validator->old("vai_tro") == "Nhân viên" ? "checked" : "") : "" ?> name="vai_tro">Nhân viên
                </label>
            </div>
            <?php if (isset($error)) : ?>
                <?php if ($error->has("vai_tro")) : ?>
                    <span class="error"><?= $error->first("vai_tro") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
    <button type="submit" class="btn btn-outline-dark mt-3">Thêm mới</button>
    <button type="reset" class="btn btn-outline-dark mt-3">Nhập lại</button>
    <a href="./khach-hang" class="btn btn-outline-dark mt-3">Danh sách</a>
</form>
<?php require_once "../views/admin/layout/header.php" ?>