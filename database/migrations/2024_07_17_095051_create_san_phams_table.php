<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('SanPhamId');  // Đặt tên cho cột ID
            $table->string('LoaiSanPham');
            $table->string('TenSanPham');
            $table->bigInteger('GiaSanPham');
            $table->string('Anh');
            $table->date('NgayNhap');
            $table->integer('TonKho');
            $table->string('MoTa');
            $table->integer('KhoHangId');
            $table->timestamps();  // Cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
