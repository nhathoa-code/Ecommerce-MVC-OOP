<?php require_once "../views/admin/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ HÀNG HÓA</h3>
<form action="./hang-hoa-sua" method='post' enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label>MÃ HÀNG HÓA</label>
            <input type="text" class="form-control" name="ma_hh" value="<?= $hang_hoa->ma_hh ?>" readonly>
        </div>
        <div class="col">
            <label>TÊN HÀNG HÓA</label>
            <input type="text" class="form-control" name="ten_hh" value="<?= $hang_hoa->ten_hh ?>">
            <span class="error"><?php echo isset($ten_hh_error) ? $ten_hh_error : "" ?></span>
        </div>
        <div class="col">
            <label>ĐƠN GIÁ</label>
            <input type="number" step="0.1" class="form-control" name="don_gia" value="<?= $hang_hoa->don_gia ?>">
            <span class="error"><?php echo isset($don_gia_error) ? $don_gia_error : "" ?></span>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <label>GIẢM GIÁ</label>
            <input type="number" step="0.1" class="form-control" name="giam_gia" value="<?= $hang_hoa->giam_gia ?>">
            <span class="error"><?php echo isset($giam_gia_error) ? $giam_gia_error : "" ?></span>
        </div>
        <div class="col">
            <label>HÌNH ẢNH</label>
            <img width="100" src="<?php echo "../content/images/products/" . $hang_hoa->hinh ?>" alt="">
            <input name="up_hinh" type="file">
            <input name="hinh" type="hidden" value="<?= $hang_hoa->hinh ?>"> (<?= $hang_hoa->hinh ?>)
        </div>
        <div class="col">
            <label>LOẠI HÀNG</label>
            <div class="form-group">
                <select class="form-control" name="ma_loai">
                    <?php
                    foreach ($loais as $loai) {
                        if ($loai->ma_loai == $hang_hoa->ma_loai) {
                            echo '<option selected value="' . $loai->ma_loai . '">' . $loai->ten_loai . '</option>';
                        } else {
                            echo '<option value="' . $loai->ma_loai . '">' . $loai->ten_loai . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>HÀNG ĐẶC BIỆT?</label>
            <div class="form-check border">
                <label class="form-check-label mr-5">
                    <input type="radio" value="1" <?= $hang_hoa->dac_biet ? 'checked' : '' ?> class="form-check-input" name="dac_biet">Đặc biệt
                </label>
                <label class="form-check-label">
                    <input type="radio" value="0" <?= $hang_hoa->dac_biet ? '' : "checked" ?> class="form-check-input" name="dac_biet">Bình thường
                </label>
            </div>
        </div>
        <div class="col">
            <label>NGÀY NHẬP</label>
            <input type="text" class="form-control" name="ngay_nhap" value="<?= date("d-m-Y", strtotime($hang_hoa->ngay_nhap)) ?>">
            <span class="error"><?php echo isset($ngay_nhap_error) ? $ngay_nhap_error : "" ?></span>
        </div>
        <div class="col">
            <label>SỐ LƯỢT XEM</label>
            <input type="text" class="form-control" value="<?= $hang_hoa->so_luot_xem ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">Mô tả:</label>
        <textarea class="form-control" name="mo_ta" rows="5" id="comment"><?= $hang_hoa->mo_ta ?></textarea>
    </div>
    <button type="submit" class="btn btn-outline-dark mt-3">Cập nhật</button>
    <button type="reset" class="btn btn-outline-dark mt-3">Nhập lại</button>
    <a href="./hang-hoa-them" class="btn btn-outline-dark mt-3">Thêm mới</a>
    <a href="./hang-hoa" class="btn btn-outline-dark mt-3">Danh sách</a>
</form>
<?php require_once "../views/admin/layout/header.php" ?>