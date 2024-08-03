<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmuc'; // Tên bảng danhmuc

    protected $primaryKey = 'id';

    public $timestamps = false; // Nếu không sử dụng created_at và updated_at

    protected $fillable = ['ten_danh_muc'];

    // Mối quan hệ với bảng SanPham
    public function sanphams()
    {
        return $this->hasMany(SanPham::class, 'DanhMucId');
    }
}
