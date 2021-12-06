<?php

use Models\KhachHang;

if (isset($_SESSION['user'])) {
    require '../views/site/layout/dang-nhap-info.php';
} else if (isset($_COOKIE["ma_kh"])) {
    $ma_kh = $_COOKIE["ma_kh"];
    $khach_hang = KhachHang::find($ma_kh);
    $_SESSION['user'] = $khach_hang;
    require '../views/site/layout/dang-nhap-info.php';
} else {
    require '../views/site/layout/dang-nhap-form.php';
}
