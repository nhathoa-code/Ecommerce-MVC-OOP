<?php

namespace Admin\Controllers;

use Models\BinhLuan;
use Models\HangHoa;

class BinhLuanController
{
    public static function index()
    {
        $items = BinhLuan::select("hh.ma_hh", "hh.ten_hh", "COUNT(*) so_luong", "MIN(binh_luan.ngay_bl) cu_nhat", "MAX(binh_luan.ngay_bl) moi_nhat")
            ->join("hang_hoa hh", "hh.ma_hh", "=", "binh_luan.ma_hh")
            ->groupBy("hh.ma_hh", "hh.ten_hh")
            ->get();
        include_once "../views/admin/binh-luan/danhsach.php";
    }

    public static function chitiet()
    {
        $items = BinhLuan::where("ma_hh", "=", $_GET['ma_hh'])->get();
        $ten_hh = HangHoa::find($_GET['ma_hh'])->ten_hh;
        include_once "../views/admin/binh-luan/chitietbinhluan.php";
    }

    public static function delete($id)
    {
        BinhLuan::destroy($id);
        header("location:" . $_SESSION['prev_page']);
    }
}
