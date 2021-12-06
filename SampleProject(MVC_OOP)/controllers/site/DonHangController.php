<?php

namespace Site\Controllers;

use Models\DonHang;
use Validation\Validator;

class DonHangController
{
    public static function them()
    {

        if (!isset($_SESSION['user'])) {
            $_SESSION['loi-dang-nhap'] = "Đăng nhập để tiếp tục";
            echo $_SESSION['loi-dang-nhap'];
            header("location:" . $_SESSION['prev_page']);
            die;
        }

        $validator = Validator::make($_POST, [
            "ho_ten" => "required",
            "sdt" => "required",
            "email" => "bail|required|email",
            "dia_chi" => "required"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/site/dathang.php";
        } else {
            $don_hang = new DonHang;
            $don_hang->ma_kh = $_SESSION['user']['ma_kh'];
            $don_hang->ho_ten = $_POST['ho_ten'];
            $don_hang->tong_tien = str_replace(",", "", $_POST['tong_tien']);
            $don_hang->dia_chi = $_POST['dia_chi'];
            $don_hang->email = $_POST['email'];
            $don_hang->so_dien_thoai = $_POST['sdt'];
            $don_hang->ngay_tao = date("Y-m-d", time());
            $don_hang->trang_thai = "đang xử lý";
            $id = $don_hang->save();
            foreach ($_SESSION['cart'] as $key => $value) {
                $don_hang->ma_dh = $id;
                $don_hang->ma_hh = $key;
                $don_hang->so_luong = $value['so_luong'];
                $don_hang->savedetail();
            }
            unset($_SESSION['cart']);
            include_once "../views/site/hoantatdathang.php";
        }
    }
}
