<?php

namespace Site\Controllers;

use Models\HangHoa;
use Models\BinhLuan;

class HangHoaController
{
    public static function chitiet($id)
    {
        $hang_hoa = HangHoa::find($id);
        $limit = 3;
        $ma_hh = $hang_hoa->ma_hh;
        $total_rows = count(BinhLuan::where("ma_hh", "=", $id)->get());
        $binh_luan_list = BinhLuan::where("ma_hh", "=", $id)->take($limit)->get();
        $hh_cung_loai = HangHoa::where("ma_loai", "=", $hang_hoa->ma_loai)->where("ma_hh", "!=", $id)->get();
        include_once "../views/site/hanghoachitiet.php";
    }

    public static function danhsach($maloai)
    {
        $limit = 3;
        if ($maloai !== "") {
            $hanghoas = HangHoa::where("ma_loai", "=", $maloai)->take($limit)->get();
            $total_products = count(HangHoa::where("ma_loai", "=", $maloai)->get());
        } else {
            $hanghoas = HangHoa::select("*")->take($limit)->get();
            $total_products = count(HangHoa::all());
        }
        include_once "../views/site/hanghoadanhsach.php";
    }

    public static function timkiem($tu_khoa)
    {
        $limit = 3;
        $keyword = $tu_khoa;
        $products = HangHoa::where("ten_hh", "like", "'%$tu_khoa%'")->take($limit)->get();
        $total_products = count(HangHoa::where("ten_hh", "like", "'%$tu_khoa%'")->get());
        include_once "../views/site/hanghoatimkiem.php";
    }

    public static function hanghoatai()
    {
        $action = $_POST['action'];
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $total_products = $_POST['total_products'];
        $output = "";
        switch ($action) {
            case "hang-hoa-danh-sach":
                $ma_loai = $_POST['ma_loai'];
                if ($ma_loai == "") {
                    $products = HangHoa::select("*")->skip($start)->take($limit)->get();
                } else {
                    $products = HangHoa::where("ma_loai", "=", $ma_loai)->skip($start)->take($limit)->get();
                }
                break;
            case "hang-hoa-tim-kiem":
                $keyword = $_POST['keyword'];
                $products = HangHoa::where("ten_hh", "like", "'%$keyword%'")->skip($start)->take($limit)->get();
                break;
        }
        foreach ($products as $product) {
            $output .= "<div class='product'>
                <div>
                    <a href='./hang-hoa-chi-tiet?ma_hh=$product->ma_hh'>
                        <img src='../content/images/products/$product->hinh' alt=''>
                    </a>
                </div>
                <div class='product-info'>
                    <p class='product-name'>
                        <a href='./hang-hoa-chi-tiet?ma_hh=$product->ma_hh'>$product->ten_hh</a>
                    </p>
                    <p class='product-price'> <span class='price'>$product->don_gia</span><a href='./hang-hoa-chi-tiet?ma_hh=$product->ma_hh' class='mua-ngay'>MUA NGAY</a></p>
                </div>
            </div>";
        }
        echo $output;
    }
}
