<?php

namespace Models;

class BinhLuan extends Model
{
    protected $table = "binh_luan";
    protected $primary_key = "ma_bl";
    public function save()
    {
        $sql = "INSERT INTO $this->table (ma_kh, ma_hh, noi_dung, ngay_bl) VALUES ('$this->ma_kh','$this->ma_hh','$this->noi_dung', '$this->ngay_bl')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET noi_dung='$this->noi_dung' WHERE ma_bl = '$this->ma_bl'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
