<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // Đặt tên bảng là sanpham

    // Nếu bảng của bạn không sử dụng cột created_at và updated_at
    //public $timestamps = false;

    // Nếu có cột primary key khác tên mặc định là 'id'
    protected $primaryKey = 'id';

    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active'
    ];

    public function products()
    {
        return $this->hasMany(SanPham::class, 'menu_id', 'id');
    }
}