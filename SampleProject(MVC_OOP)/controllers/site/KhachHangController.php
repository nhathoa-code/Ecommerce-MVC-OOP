<?php

namespace Site\Controllers;

use Models\KhachHang;
use Validation\Validator;

class KhachHangController
{
    public static function dangnhap()
    {
        $mat_khau = $_POST['mat_khau'];
        $ma_kh = $_POST['ma_kh'];
        $_SESSION['mat_khau_old'] = $mat_khau;
        $_SESSION['ma_kh_old'] = $ma_kh;
        $user = KhachHang::find($ma_kh);
        if ($user) {
            if ($user->mat_khau == $mat_khau) {
                $_SESSION["user"] = array("ma_kh" => $user->ma_kh, "ho_ten" => $user->ho_ten, "vai_tro" => $user->vai_tro);
                // Xử lý ghi nhớ tài khoản
                if (isset($_POST["ghi_nho"])) {
                    setcookie("ma_kh", $ma_kh, time() + (86400 * 7), "/");
                } else {
                    setcookie("ma_kh", "", -1, "/");
                }
                // Quay trở lại trang được yêu cầu
                header("location: " . $_SESSION['prev_page']);
            } else {
                $_SESSION['mat_khau_error'] = "Sai mật khẩu!";
                header("location: " . $_SESSION['prev_page']);
            }
        } else {
            $_SESSION['ma_kh_error'] = "Sai mã khách hàng!";
            header("location: " . $_SESSION['prev_page']);
        }
    }

    public static function dangxuat()
    {
        unset($_SESSION['user'], $_SESSION['mat_khau_old'], $_SESSION['ma_kh_old']);
        setcookie("ma_kh", "", -1, "/");
        header("location:" . $_SESSION['prev_page']);
    }

    public static function dangky()
    {
        $validator = Validator::make($_POST, [
            "ma_kh" => "bail|required|unique:khach_hang",
            "ho_ten" => "bail|required",
            "mat_khau" => "bail|required|min:6|confirmed",
            "mat_khau_confirmed" => "required",
            "email" => "bail|required|email",
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/site/dangkyform.php";
        } else {
            $validator = null;
            $khach_hang = new KhachHang;
            $khach_hang->ma_kh = $_POST['ma_kh'];
            $khach_hang->mat_khau = $_POST['mat_khau'];
            $khach_hang->ho_ten = $_POST['ho_ten'];
            $khach_hang->email = $_POST['email'];
            $khach_hang->vai_tro = "Khách hàng";
            $khach_hang->save();
            $message = "Đăng ký thành công!";
            include_once "../views/site/dangkyform.php";
        }
    }
}
