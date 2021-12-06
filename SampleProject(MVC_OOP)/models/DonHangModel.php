<?php

namespace Models;

class DonHang extends Model
{
    protected $table = "don_hang";
    protected $primary_key = "ma_dh";
    public function save()
    {
        $sql = "INSERT INTO $this->table (ma_kh,ho_ten,tong_tien,dia_chi,email,so_dien_thoai,ngay_tao,trang_thai) VALUES ('$this->ma_kh', '$this->ho_ten', '$this->tong_tien', '$this->dia_chi', '$this->email','$this->so_dien_thoai','$this->ngay_tao','$this->trang_thai')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function savedetail()
    {
        $sql = "INSERT INTO chi_tiet_don_hang (ma_dh,ma_hh,so_luong) VALUES ('$this->ma_dh', '$this->ma_hh', '$this->so_luong')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
