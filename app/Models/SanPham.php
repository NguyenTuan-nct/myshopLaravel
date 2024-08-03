<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham'; // Đặt tên bảng là sanpham

    // Nếu bảng của bạn không sử dụng cột created_at và updated_at
    public $timestamps = false;

    // Nếu có cột primary key khác tên mặc định là 'id'
    protected $primaryKey = 'SanPhamId';

    // Các cột có thể điền được
    protected $fillable = [
        'LoaiSanPham',
        'TenSanPham',
        'GiaSanPham',
        'Anh',
        'NgayNhap',
        'TonKho',
        'MoTa',
        'KhoHangId',
        'DanhMucId', // Thêm DanhMucId để hỗ trợ khóa ngoại
    ];

    // Thiết lập mối quan hệ với model DanhMuc
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'DanhMucId');
    }
}
