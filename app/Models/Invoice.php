<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total_amount'];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(KhachHang::class, 'customer_id', 'id');
    }
}
