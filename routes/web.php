<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('admin-home', [HomeController::class, 'index'])->name('homeafter');


Route::middleware(['auth'])->group(function () {
    Route::get('admin', [MainController::class, 'index'])->name('admin');
    Route::get('admin/khachhang', [KhachHangController::class, 'index'])->name('khachhang.index');
    Route::get('admin/khachhang/{id}/edit', [KhachHangController::class, 'edit'])->name('khachhang.edit');
    Route::put('admin/khachhang/{id}', [KhachHangController::class, 'update'])->name('admin.khachhang.update');
    Route::delete('admin/khachhang/{id}', [KhachHangController::class, 'destroy'])->name('khachhang.destroy');
    Route::get('admin/addkh', [KhachHangController::class, 'create'])->name('khachhang.create');
    Route::post('admin/addkh', [KhachHangController::class, 'store'])->name('khachhang.store');

    Route::get('admin/sanpham', [SanPhamController::class, 'viewsp'/*tên hàm*/])->name('sanpham.viewsp');
    Route::get('admin/sanpham/{id}/edit', [SanPhamController::class, 'edit'])->name('sanpham.edit');
    Route::put('admin/sanpham/{id}', [SanPhamController::class, 'update'])->name('sanpham.update');
    Route::delete('admin/sanpham/{id}', [SanPhamController::class, 'destroy'])->name('sanpham.destroy');
    Route::get('admin/addsp', [SanPhamController::class, 'create'])->name('sanpham.create');
    Route::post('admin/addsp', [SanPhamController::class, 'store'])->name('sanpham.store');

    Route::get('admin/hoadon', [InvoiceController::class, 'index'/*tên hàm*/])->name('invoices.index');
    Route::get('admin/hoadon/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::put('admin/hoadon/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('admin/hoadon/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    Route::get('admin/addhoadon', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('admin/addhoadon', [InvoiceController::class, 'store'])->name('invoices.store');

    Route::get('admin/invoices/{invoice}/details', [InvoiceDetailController::class, 'index'])->name('invoice_details.index');
    Route::get('admin/invoices/{invoice}/details/create', [InvoiceDetailController::class, 'create'])->name('invoice_details.create');
    Route::post('admin/invoices/{invoice}/details', [InvoiceDetailController::class, 'store'])->name('invoice_details.store');
    Route::get('admin/invoices/{invoice}/details/{detail}/edit', [InvoiceDetailController::class, 'edit'])->name('invoice_details.edit');
    Route::put('admin/invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'update'])->name('invoice_details.update');
    Route::delete('admin/invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'destroy'])->name('invoice_details.destroy');
});

Route::get('admin/users/login', [LoginController::class, 'index']) -> name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
// Định nghĩa route đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    return redirect('admin-home'); // hoặc route khác mà bạn muốn chuyển hướng sau khi đăng xuấts
})->name('logout');


Route::get('customer/sanpham', [SanPhamController::class, 'viewsp_kh'/*tên hàm*/])->name('sanpham.viewsp_kh');