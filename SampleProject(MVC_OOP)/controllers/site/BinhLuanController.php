<?php

namespace Site\Controllers;

use Models\BinhLuan;

class BinhLuanController
{
    public static function them()
    {
        $binh_luan = new BinhLuan();
        $binh_luan->ma_kh = $_SESSION['user']['ma_kh'];
        $binh_luan->ma_hh = $_GET['ma_hh'];
        $binh_luan->noi_dung = $_GET['noi_dung'];
        $binh_luan->ngay_bl = date("Y-m-d", time());
        $binh_luan->save();
        header("location:" . $_SESSION['prev_page']);
    }

    public static function sua()
    {
        $binh_luan = BinhLuan::find($_GET['ma_bl']);
        $binh_luan->noi_dung = $_GET['noi_dung'];
        $binh_luan->update();
    }

    public static function taibinhluan()
    {

        function phan_trang($total_pages, $page_num, $limit, $ma_hh)
        {
            $output = "";
            $nav_page = "";
            $start = ($page_num - 1) * $limit;
            $rows = BinhLuan::where("ma_hh", "=", $ma_hh)->skip($start)->take($limit)->get();
            foreach ($rows as $row) {
                $output .=  "<div data-id='$row->ma_bl' class='comment'>
    <div class='nguoi-binh-luan'>
        <div style='flex: 1;'>
            <p class='name'>$row->ma_kh</p>
            <p class='date'>$row->ngay_bl</p>
        </div>";
                if (isset($_SESSION['user']) && $_SESSION['user']['ma_kh'] == $row->ma_kh) {
                    $output .= "<div class='comment-control'>
                <button data-id='$row->ma_bl' class='edit btn btn-outline-dark'>Edit</button>
       
            </div></div>
                <p data-id='$row->ma_bl' class='noi-dung edit-note'>
            $row->noi_dung
                </p>
                </div>";
                } else {
                    $output .= "</div>
                            <p data-id='$row->ma_bl' class='noi-dung edit-note'>
                             $row->noi_dung
                            </p>
                        </div>";
                }
            }

            $previous = $page_num - 1;
            $pages_left = $total_pages - $page_num;
            if ($page_num > 1) {
                $nav_page .= "<span class='item'>
                    <a class='page' data-page='1'>First</a>
                </span>
                <span class='item active'>
                    <a class='page' data-page='$previous'>$previous</a>
                </span>
                ";
            }

            $nav_page .= "<span class='item active'>
                    <a class='page active-page' data-page='$page_num'>$page_num</a>
                 </span>";

            if ($pages_left > 3) {
                $limit_break = 0;
                for ($i = $page_num + 1; $i <= $total_pages; $i++) {
                    $nav_page .= "<span class='item'>
                    <a class='page' data-page='$i'>$i</a>
                </span>";
                    $limit_break++;
                    if ($limit_break == 3) {
                        break;
                    }
                }
            } else {
                for ($i = $page_num + 1; $i <= $total_pages; $i++) {
                    $nav_page .= "<span class='item'>
                    <a class='page' data-page='$i'>$i</a>
                </span>";
                }
            }
            if ($page_num < $total_pages) {
                $nav_page .= "<span class='item'>
                    <a class='page' data-page='$total_pages'>Last</a>
                </span>
                ";
            }
            return array("output" => $output, "nav_page" => $nav_page);
        }
        $limit = $_GET['limit'];
        $total_pages = (int)$_GET['total_pages'];
        $page_num = (int)$_GET['page_num'];
        $ma_hh = (int)$_GET['ma_hh'];
        echo json_encode(phan_trang($total_pages, $page_num, $limit, $ma_hh));
    }
}
