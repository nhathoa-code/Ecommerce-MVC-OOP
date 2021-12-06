<?php

namespace Models;

class HangHoa extends Model
{
    protected $table = "hang_hoa";
    protected $primary_key = "ma_hh";

    public function save()
    {
        $sql = "INSERT INTO $this->table (ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet,ngay_nhap, mo_ta) VALUES ('$this->ten_hh','$this->don_gia','$this->giam_gia','$this->hinh','$this->ma_loai','$this->dac_biet','$this->ngay_nhap','$this->mo_ta')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET ten_hh = '$this->ten_hh',don_gia = '$this->don_gia',giam_gia = '$this->giam_gia',hinh = '$this->hinh',ma_loai = '$this->ma_loai',dac_biet = '$this->dac_biet',ngay_nhap = '$this->ngay_nhap',mo_ta = '$this->mo_ta' WHERE ma_hh = $this->ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}






























// function hang_hoa_select_page()
// {
//     if (!isset($_SESSION['page_no'])) {
//         $_SESSION['page_no'] = 0;
//     }
//     if (!isset($_SESSION['page_count'])) {
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count / 10.0);
//     }
//     if (array_key_exists("page_no", $_REQUEST)) {
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if ($_SESSION['page_no'] < 0) {
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if ($_SESSION['page_no'] >= $_SESSION['page_count']) {
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT " . $_SESSION['page_no'] . ", 10";
//     return pdo_query($sql);
// }
