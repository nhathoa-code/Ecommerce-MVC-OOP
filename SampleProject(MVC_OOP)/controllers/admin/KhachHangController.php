<?php

namespace Admin\Controllers;

use Models\KhachHang;
use Validation\Validator;

class KhachHangController
{
    public static function index()
    {
        $list = KhachHang::all();
        include_once "../views/admin/khach-hang/danhsach.php";
    }

    public static function create()
    {
        include_once "../views/admin/khach-hang/them.php";
    }

    public static function store()
    {

        $validator = Validator::make($_POST, [
            "ma_kh" => "bail|required|unique:khach_hang",
            "ho_ten" => "bail|required",
            "mat_khau" => "bail|required|min:6|confirmed",
            "mat_khau_confirmed" => "required",
            "email" => "bail|required|email",
            "vai_tro" => "required"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/admin/khach-hang/them.php";
        } else {
            $validator = null;
            $khach_hang = new KhachHang;
            $khach_hang->ma_kh = $_POST['ma_kh'];
            $khach_hang->mat_khau = $_POST['mat_khau'];
            $khach_hang->ho_ten = $_POST['ho_ten'];
            $khach_hang->email = $_POST['email'];
            $khach_hang->vai_tro = $_POST['vai_tro'];
            $khach_hang->save();
            $message = "Thêm mới thành công!";
            include_once "../views/admin/khach-hang/them.php";
        }
    }

    public static function delete($id)
    {
        if (is_array($id)) {
            foreach ($id as $ele) {
                KhachHang::destroy($ele);
            }
        } else {
            KhachHang::destroy($id);
        }
        $_SESSION['message'] = "Xóa thành công";
        header("location: ./khach-hang");
    }

    public static function edit($id)
    {
        $khach_hang = KhachHang::find($id);
        include_once "../views/admin/khach-hang/sua.php";
    }

    public static function update()
    {
        $ma_kh = $_POST['ma_KH'];
        $validator = Validator::make($_POST, [
            "ma_kh" => "bail|required|unique:khach_hang:except:$ma_kh:ma_kh",
            "ho_ten" => "bail|required",
            "mat_khau" => "bail|required|min:6|confirmed",
            "email" => "bail|required|email",
            "vai_tro" => "required"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/admin/khach-hang/sua.php";
        } else {
            $khach_hang = KhachHang::find($_POST['ma_kh']);
            $khach_hang->ho_ten = $_POST['ho_ten'];
            $khach_hang->email = $_POST['email'];
            $khach_hang->mat_khau = $_POST['mat_khau'];
            $khach_hang->vai_tro = $_POST['vai_tro'];
            $khach_hang->update();
            $_SESSION['message'] = "Cập nhật thành công";
            header("location: ./khach-hang");
        }
    }
}
