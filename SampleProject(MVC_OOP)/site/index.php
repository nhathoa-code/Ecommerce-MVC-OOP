<?php
session_start();
$_SESSION['prev_page'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['REQUEST_URI'];
$url = isset($_GET['url']) ? $_GET['url'] : "/";

require_once "../vendor/autoload.php";
require_once "../models/Model.php";
require_once "../models/LoaiHangModel.php";
require_once "../models/HangHoaModel.php";
require_once "../models/KhachHangModel.php";
require_once "../models/DonHangModel.php";
require_once "../models/BinhLuanModel.php";
require_once "../models/MessageBag.php";
require_once "../models/Validator.php";

use Site\Controllers\DonHangController;
use Site\Controllers\HomeController;
use Site\Controllers\HangHoaController;
use Site\Controllers\GioHangController;
use Site\Controllers\KhachHangController;
use Site\Controllers\BinhLuanController;


switch ($url) {
    case "/":
        HomeController::index();
        break;
    case "gioi-thieu":
        HomeController::gioithieu();
        break;
    case "lien-he":
        HomeController::lienhe();
        break;
    case "gop-y":
        HomeController::gopy();
        break;
    case "hoi-dap":
        HomeController::hoidap();
        break;
    case "hang-hoa-chi-tiet":
        $ma_hh = $_GET['ma_hh'];
        HangHoaController::chitiet($ma_hh);
        break;
    case "hang-hoa-danh-sach":
        $ma_loai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : "";
        HangHoaController::danhsach($ma_loai);
        break;
    case "hang-hoa-tim-kiem":
        $tu_khoa = $_GET['tu_khoa'];
        HangHoaController::timkiem($tu_khoa);
        break;
    case "hang-hoa-tai":
        HangHoaController::hanghoatai();
        break;
    case "gio-hang-them":
        GioHangController::them();
        break;
    case "gio-hang":
        GioHangController::giohang();
        break;
    case "gio-hang-cap-nhat":
        GioHangController::giohangcapnhat();
        break;
    case "gio-hang-xoa":
        GioHangController::giohangxoa();
        break;
    case "dat-hang":
        require_once "../views/site/dathang.php";
        break;
    case "don-hang-them":
        DonHangController::them();
        break;
    case "khach-hang-dang-nhap":
        KhachHangController::dangnhap();
        break;
    case "khach-hang-dang-xuat":
        KhachHangController::dangxuat();
        break;
    case "dang-ky-form":
        require_once "../views/site/dangkyform.php";
        break;
    case "dang-ky":
        KhachHangController::dangky();
        break;
    case "binh-luan-them":
        BinhLuanController::them();
        break;
    case "binh-luan-sua":
        BinhLuanController::sua();
        break;
    case "tai-binh-luan":
        BinhLuanController::taibinhluan();
        break;
    default:
        echo "page not found";
}
