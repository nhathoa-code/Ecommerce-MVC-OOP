<?php

namespace Admin\Controllers;

use Models\LoaiHang;
use Validation\Validator;

class LoaiHangController
{
    public static function index()
    {
        $list = LoaiHang::all();
        include_once "../views/admin/loai-hang/danhsach.php";
    }


    public static function create()
    {
        include_once "../views/admin/loai-hang/them.php";
    }

    public static function store()
    {

        $validator = Validator::make($_POST, [
            "ten_loai" => "bail|required|unique:loai"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/admin/loai-hang/them.php";
        } else {
            $validator = null;
            $loai_hang = new LoaiHang;
            $loai_hang->ten_loai = $_POST['ten_loai'];
            $loai_hang->save();
            $message = "Thêm mới thành công!";
            include_once "../views/admin/loai-hang/them.php";
        }
    }

    public static function delete($id)
    {
        LoaiHang::destroy($id);
        $_SESSION['message'] = "Xóa thành công";
        header("location: ./loai-hang");
    }

    public static function edit($id)
    {
        $item = LoaiHang::find($id);
        include_once "../views/admin/loai-hang/sua.php";
    }

    public static function update()
    {
        $maloai = $_POST['ma_loai'];
        $validator = Validator::make($_POST, [
            "ten_loai" => "bail|required|unique:loai:except:$maloai:ma_loai"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            include_once "../views/admin/loai-hang/sua.php";
        } else {
            $loai_hang = LoaiHang::find($_POST['ma_loai']);
            $loai_hang->ten_loai = $_POST['ten_loai'];
            $loai_hang->update();
            $_SESSION['message'] = "Cập nhật thành công";
            header("location: ./loai-hang");
        }
    }
}
