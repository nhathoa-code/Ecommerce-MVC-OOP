<?php

namespace Site\Controllers;

use Models\HangHoa;

class GioHangController
{
    public static function them()
    {
        $hanghoa = HangHoa::find($_POST['ma_hh']);
        if (isset($_SESSION['cart'])) {
            if (array_key_exists($hanghoa->ma_hh, $_SESSION['cart'])) {
                $_SESSION['cart'][$hanghoa->ma_hh]['so_luong'] = $_SESSION['cart'][$hanghoa->ma_hh]['so_luong'] + 1;
            } else {
                $_SESSION['cart'][$hanghoa->ma_hh] = array("ten_hh" => $hanghoa->ten_hh, "hinh" => $hanghoa->hinh, "don_gia" => $hanghoa->don_gia * (1 - $hanghoa->giam_gia), "so_luong" => 1);
            }
        } else {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][$hanghoa->ma_hh] = array("ten_hh" => $hanghoa->ten_hh, "hinh" => $hanghoa->hinh, "don_gia" => $hanghoa->don_gia * (1 - $hanghoa->giam_gia), "so_luong" => 1);
        }
        $so_luong = 0;
        foreach ($_SESSION['cart'] as $product) {
            $so_luong += $product['so_luong'];
        }
        echo $so_luong;
    }

    public static function giohang()
    {
        include_once "../views/site/giohang.php";
    }

    public static function giohangcapnhat()
    {
        $plus_or_minus = $_POST['plus-or-minus'];
        if ($plus_or_minus == "btn-plus") {
            $key = $_POST['key'];
            $_SESSION['cart'][$key]['so_luong'] = $_SESSION['cart'][$key]['so_luong'] + 1;
        } else {
            $key = $_POST['key'];
            $_SESSION['cart'][$key]['so_luong'] = $_SESSION['cart'][$key]['so_luong'] - 1;
        }
    }

    public static function giohangxoa()
    {
        $key = $_GET['key'];
        unset($_SESSION['cart'][$key]);
        header("location:./gio-hang");
    }
}
