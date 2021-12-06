<?php

namespace Models;

class KhachHang extends Model
{
    protected $table = "khach_hang";
    protected $primary_key = "ma_kh";
    public function save()
    {
        $sql = "INSERT INTO $this->table (ma_kh, mat_khau, ho_ten, email, vai_tro) VALUES ('$this->ma_kh', '$this->mat_khau', '$this->ho_ten', '$this->email', '$this->vai_tro')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE khach_hang SET mat_khau = '$this->mat_khau',ho_ten = '$this->ho_ten',email = '$this->email',vai_tro = '$this->vai_tro' WHERE ma_kh = '$this->ma_kh'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
