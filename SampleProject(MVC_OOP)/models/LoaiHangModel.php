<?php

namespace Models;

class LoaiHang extends Model
{
    protected $table = "loai";
    protected $primary_key = "ma_loai";
    public function save()
    {
        $sql = "INSERT INTO $this->table (ten_loai) VALUES ('$this->ten_loai')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET ten_loai = '$this->ten_loai' WHERE ma_loai = '$this->ma_loai'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
