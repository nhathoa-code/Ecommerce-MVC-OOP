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
require_once "../models/ChiTietDonHangModel.php";
require_once "../models/BinhLuanModel.php";
require_once "../models/Validator.php";
require_once "../models/MessageBag.php";


use Admin\Controllers\HomeController;
use Admin\Controllers\LoaiHangController;
use Admin\Controllers\HangHoaController;
use Admin\Controllers\KhachHangController;
use Admin\Controllers\BinhLuanController;
use Admin\Controllers\DonHangController;


switch ($url) {
    case "/":
        HomeController::home();
        break;
        /*------------ Loai Hang -------------*/
    case "loai-hang":
        LoaiHangController::index();
        break;
    case "loai-hang-them-form":
        LoaiHangController::create();
        break;
    case "loai-hang-them":
        LoaiHangController::store();
        break;
    case "loai-hang-xoa":
        $ma_loai = $_GET['ma_loai'];
        LoaiHangController::delete($ma_loai);
        break;
    case "loai-hang-sua-form":
        $ma_loai = $_GET['ma_loai'];
        LoaiHangController::edit($ma_loai);
        break;
    case "loai-hang-sua":
        LoaiHangController::update();
        break;
        /*------------ Loai Hang -------------*/
        /*------------ Hang Hoa -------------*/
    case "hang-hoa":
        HangHoaController::index();
        break;
    case "hang-hoa-them-form":
        HangHoaController::create();
        break;
    case "hang-hoa-them":
        HangHoaController::store();
        break;
    case "hang-hoa-xoa":
        $ma_hh = $_GET['ma_hh'];
        HangHoaController::delete($ma_hh);
        break;
    case "hang-hoa-sua-form":
        $ma_hh = $_GET['ma_hh'];
        HangHoaController::edit($ma_hh);
        break;
    case "hang-hoa-sua":
        HangHoaController::update();
        break;
    case "thong-ke":
        HangHoaController::thongke();
        break;
    case "bieu-do-thong-ke":
        HangHoaController::bieudo();
        break;
        /*------------ Hang Hoa -------------*/
        /*------------ Khach Hang -------------*/
    case "khach-hang":
        KhachHangController::index();
        break;
    case "khach-hang-them-form":
        KhachHangController::create();
        break;
    case "khach-hang-them":
        KhachHangController::store();
        break;
    case "khach-hang-xoa":
        $ma_kh = $_GET['ma_kh'];
        KhachHangController::delete($ma_kh);
        break;
    case "khach-hang-sua-form":
        $ma_kh = $_GET['ma_kh'];
        KhachHangController::edit($ma_kh);
        break;
    case "khach-hang-sua":
        KhachHangController::update();
        break;
        /*------------ Khach Hang -------------*/
        /*------------ Binh Luan -------------*/
    case "binh-luan":
        BinhLuanController::index();
        break;
    case "binh-luan-chi-tiet":
        BinhLuanController::chitiet();
        break;
    case "binh-luan-xoa":
        $ma_bl = $_GET['ma_bl'];
        BinhLuanController::delete($ma_bl);
        break;
        /*------------ Binh Luan -------------*/
        /*------------ Don Hang -------------*/
    case "don-hang":
        DonHangController::index();
        break;
    case "don-hang-xoa":
        $id = $_GET['ma_dh'];
        DonHangController::delete($id);
        break;
    case "don-hang-chi-tiet":
        $id = $_GET['ma_dh'];
        DonHangController::chitiet($id);
        break;
        /*------------ Don Hang -------------*/
    default:
        echo "page not found";
}
