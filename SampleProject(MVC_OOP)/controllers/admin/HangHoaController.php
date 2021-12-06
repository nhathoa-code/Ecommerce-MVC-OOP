<?php

namespace Admin\Controllers;

use Models\HangHoa;
use Models\LoaiHang;
use Validation\Validator;

class HangHoaController
{
    public static function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 3;
        $start = ($page - 1) * $limit;
        $total_products = count(HangHoa::all());
        /*---------------- phan trang --------------*/
        $url = "./hang-hoa";
        $nav_page = "";
        $total_pages = ceil($total_products / $limit);
        if ($total_pages > 1) {
            $previous = $page - 1;
            $pages_left = $total_pages - $page;
            if ($page > 1) {
                $nav_page .= "<span class='item'>
                    <a href='$url?page=1' class='page'>First</a>
                </span>
                <span class='item'>
                    <a href='$url?page=$previous' class='page'>$previous</a>
                </span>
                ";
            }

            $nav_page .= "<span class='item'>
                    <a href='$url?page=$page' class='page active-page'>$page</a>
                 </span>";

            if ($pages_left > 3) {
                $limit = 0;
                for ($i = $page + 1; $i <= $total_pages; $i++) {
                    $nav_page .= "<span class='item'>
                    <a href='$url?page=$i' class='page'>$i</a>
                </span>";
                    $limit++;
                    if ($limit == 3) {
                        break;
                    }
                }
            } else {
                for ($i = $page + 1; $i <= $total_pages; $i++) {
                    $nav_page .= "<span class='item'>
                    <a href='$url?page=$i' class='page' data-page='$i'>$i</a>
                </span>";
                }
            }
            if ($page < $total_pages) {
                $nav_page .= "<span class='item'>
                    <a href='$url?page=$total_pages' class='page'>Last</a>
                </span>
                ";
            }
        } else {
            $nav_page = "";
        }
        /*---------------- phan trang --------------*/
        $list = HangHoa::select("*")->orderBy("ngay_nhap")->skip($start)->take($limit)->get();
        include_once "../views/admin/hang-hoa/danhsach.php";
    }

    public static function create()
    {
        $loais = LoaiHang::all();
        include_once "../views/admin/hang-hoa/them.php";
    }

    public static function store()
    {
        if ($_FILES[array_keys($_FILES)[0]]['size'] > 0) {
            $Fields = $_POST += array(array_keys($_FILES)[0] => $_FILES[array_keys($_FILES)[0]]['name']);
        } else {
            $Fields = $_POST;
        }
        $validator = Validator::make($_POST, [
            "ten_hh" => "required",
            "don_gia" => "required",
            "giam_gia" => "required",
            "hinh" => "required",
            "dac_biet" => "required",
            "mo_ta" => "required"
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $loais = LoaiHang::all();
            include_once "../views/admin/hang-hoa/them.php";
        } else {
            $validator = null;
            $hang_hoa = new HangHoa;
            $hang_hoa->ten_hh = $_POST['ten_hh'];
            $hang_hoa->don_gia = $_POST['don_gia'];
            $hang_hoa->giam_gia = $_POST['giam_gia'];
            $hang_hoa->ma_loai = $_POST['ma_loai'];
            $hang_hoa->dac_biet = $_POST['dac_biet'];
            $hang_hoa->ngay_nhap = date("Y-m-d", strtotime($_POST['ngay_nhap']));
            $hang_hoa->mo_ta = $_POST['mo_ta'];
            $hang_hoa->hinh = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'], "../content/images/products/" . $hang_hoa->hinh);
            $hang_hoa->save();
            $message = "Thêm mới thành công!";
            include_once "../views/admin/hang-hoa/them.php";
        }
    }

    public static function delete($id)
    {
        if (is_array($id)) {
            foreach ($id as $ele) {
                $hang_hoa = HangHoa::find($ele);
                unlink("../content/images/products/" . $hang_hoa->hinh);
            }
        } else {
            $hang_hoa = HangHoa::find($id);
            unlink("../content/images/products/" . $hang_hoa->hinh);
        }
        HangHoa::destroy($id);
        $_SESSION['message'] = "Xóa thành công";
        header("location:" . $_SESSION['back']);
    }

    public static function edit($id)
    {
        $hang_hoa = HangHoa::find($id);
        $loais = LoaiHang::all();
        include_once "../views/admin/hang-hoa/sua.php";
    }

    public static function update()
    {
        $hang_hoa = HangHoa::find($_POST['ma_hh']);
        $hang_hoa->ten_hh = $_POST['ten_hh'];
        $hang_hoa->don_gia = $_POST['don_gia'];
        $hang_hoa->giam_gia = $_POST['giam_gia'];
        $hang_hoa->ma_loai = $_POST['ma_loai'];
        $hang_hoa->dac_biet = $_POST['dac_biet'] == "1" ? true : false;
        $hang_hoa->ngay_nhap = date("Y-m-d", strtotime($_POST['ngay_nhap']));
        $hang_hoa->mo_ta = $_POST['mo_ta'];
        if ($_FILES['up_hinh']['size'] > 0) {
            unlink("../content/images/products/" . $_POST['hinh']);
            move_uploaded_file($_FILES['up_hinh']['tmp_name'], "../content/images/products/" . $_FILES['up_hinh']['name']);
            $hang_hoa->hinh = $_FILES['up_hinh']['name'];
        } else {
            $hang_hoa->hinh = $_POST['hinh'];
        }
        $hang_hoa->update();
        $_SESSION['message'] = "Cập nhật thành công";
        header("location:" . $_SESSION['back']);
    }

    public static function thongke()
    {
        $items = HangHoa::select("lo.ma_loai", "lo.ten_loai", "COUNT(*) so_luong", "MIN(hang_hoa.don_gia) gia_min", "MAX(hang_hoa.don_gia) gia_max", "AVG(hang_hoa.don_gia) gia_avg")
            ->join("loai lo", "lo.ma_loai", "=", "hang_hoa.ma_loai")
            ->groupBy("lo.ma_loai", "lo.ten_loai")
            ->get();
        include_once "../views/admin/thong-ke/thongke.php";
    }

    public static function bieudo()
    {
        $items = HangHoa::select("lo.ma_loai", "lo.ten_loai", "COUNT(*) so_luong", "MIN(hang_hoa.don_gia) gia_min", "MAX(hang_hoa.don_gia) gia_max", "AVG(hang_hoa.don_gia) gia_avg")
            ->join("loai lo", "lo.ma_loai", "=", "hang_hoa.ma_loai")
            ->groupBy("lo.ma_loai", "lo.ten_loai")
            ->get();
        include_once "../views/admin/thong-ke/bieudo.php";
    }
}
