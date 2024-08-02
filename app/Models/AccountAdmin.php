<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AccountAdmin extends Model
{
    // Danh sách các trường có thể gán hàng loạt
    protected $fillable = ['username', 'password'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Mã hóa mật khẩu trước khi tạo bản ghi mới
        static::creating(function ($model) {
            if (isset($model->password)) {
                $model->password = Hash::make($model->password);
            }
        });

        // Mã hóa mật khẩu trước khi cập nhật bản ghi
        static::updating(function ($model) {
            if (isset($model->password) && $model->isDirty('password')) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}
