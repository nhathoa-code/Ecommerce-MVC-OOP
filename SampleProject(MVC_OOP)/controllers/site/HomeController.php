<?php

namespace Site\Controllers;

use Models\LoaiHang;
use Models\HangHoa;

class HomeController
{
    public static function index()
    {
        $products = HangHoa::where("dac_biet", "=", "1")->get();
        include_once "../views/site/home.php";
    }
    public static function gioithieu()
    {
        include_once "../views/site/gioithieu.php";
    }
    public static function lienhe()
    {
        include_once "../views/site/lienhe.php";
    }
    public static function gopy()
    {
        include_once "../views/site/gopy.php";
    }
    public static function hoidap()
    {
        include_once "../views/site/hoidap.php";
    }
}
