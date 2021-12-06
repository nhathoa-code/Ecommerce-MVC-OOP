<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ HÀNG HÓA</h3>
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
<form action="./hang-hoa-them" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label>MÃ HÀNG HÓA</label>
            <input type="text" class="form-control" placeholder="auto number" name="ma_hh" readonly>
        </div>
        <div class="col">
            <label>TÊN HÀNG HÓA</label>
            <input type="text" class="form-control" name="ten_hh" value="<?php echo isset($validator) ? $validator->old("ten_hh") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("ten_hh")) : ?>
                    <span class="error"><?= $error->first("ten_hh") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>ĐƠN GIÁ</label>
            <input type="number" step="0.01" class="form-control" name="don_gia" value="<?php echo isset($validator) ? $validator->old("don_gia") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("don_gia")) : ?>
                    <span class="error"><?= $error->first("don_gia") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <label>GIẢM GIÁ</label>
            <input type="number" step="0.01" class="form-control" name="giam_gia" value="<?php echo isset($validator) ? $validator->old("giam_gia") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("giam_gia")) : ?>
                    <span class="error"><?= $error->first("giam_gia") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>HÌNH ẢNH</label>
            <input type="file" class="form-control" name="hinh">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("hinh")) : ?>
                    <span class="error"><?= $error->first("hinh") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="col">
            <label>LOẠI HÀNG</label>
            <div class="form-group">
                <select class="form-control" name="ma_loai">
                    <?php
                    foreach ($loais as $loai) {
                        echo '<option value="' . $loai->ma_loai . '">' . $loai->ten_loai . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>HÀNG ĐẶC BIỆT?</label>
            <div class="form-check py-1">
                <label class="form-check-label mr-5">
                    <input type="radio" value="1" <?php echo isset($validator) ? ($validator->old("dac_biet") == "1" ? "checked" : "") : "" ?> class="form-check-input" name="dac_biet">Đặc biệt
                </label>
                <label class="form-check-label">
                    <input type="radio" value="0" <?php echo isset($validator) ? ($validator->old("dac_biet") == "0" ? "checked" : "") : "" ?> class="form-check-input" name="dac_biet">Bình thường
                </label>
                <?php if (isset($error)) : ?>
                    <?php if ($error->has("dac_biet")) : ?>
                        <span class="error"><?= $error->first("dac_biet") ?></span>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
        <div class="col">
            <label>NGÀY NHẬP</label>
            <input type="text" class="form-control" value="<?php echo date("d-m-Y", time()) ?>" name="ngay_nhap" readonly>
        </div>
        <div class="col">
            <label>SỐ LƯỢT XEM</label>
            <input type="text" class="form-control" value="0" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">Mô tả:</label>
        <textarea class="form-control" name="mo_ta" rows="5" id="comment"><?php echo isset($validator) ? $validator->old("mo_ta") : "" ?></textarea>
        <?php if (isset($error)) : ?>
            <?php if ($error->has("mo_ta")) : ?>
                <span class="error"><?= $error->first("mo_ta") ?></span>
            <?php endif ?>
        <?php endif ?>
    </div>
    <button type="submit" name="submit" class="btn btn-outline-dark mt-3">Thêm mới</button>
    <button type="reset" class="btn btn-outline-dark mt-3">Nhập lại</button>
    <a href="./hang-hoa" class="btn btn-outline-dark mt-3">Danh sách</a>
</form>
<?php require_once "../views/admin/layout/header.php" ?>