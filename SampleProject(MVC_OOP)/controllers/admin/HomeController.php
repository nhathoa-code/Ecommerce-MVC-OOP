<?php

namespace Admin\Controllers;

use Models\LoaiHang;

class HomeController
{
    public static function home()
    {
        include_once "../views/admin/home.php";
    }
}
