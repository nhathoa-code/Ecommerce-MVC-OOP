<?php

namespace Admin\Controllers;

use Models\DonHang;
use Models\ChiTietDonHang;

class DonHangController
{
    public static function index()
    {
        $items = DonHang::all();
        include_once "../views/admin/don-hang/danhsach.php";
    }

    public static function delete($id)
    {
        DonHang::destroy($id);
        $_SESSION['message'] = "Xóa thành công";
        header("location: ./don-hang");
    }

    public static function chitiet($id)
    {
        $don_hang = DonHang::find($id);
        $items = ChiTietDonHang::select("hh.ten_hh", "hh.don_gia", "hh.hinh", "chi_tiet_don_hang.so_luong", "(chi_tiet_don_hang.so_luong*hh.don_gia) AS thanh_tien")
            ->join("don_hang dh", "chi_tiet_don_hang.ma_dh", "=", "dh.ma_dh")
            ->join("hang_hoa hh", "chi_tiet_don_hang.ma_hh", "=", "hh.ma_hh")
            ->where("dh.ma_dh", "=", $id)
            ->get();
        include_once "../views/admin/don-hang/chitietdonhang.php";
    }
}
