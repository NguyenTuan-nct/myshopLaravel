<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Nếu người dùng đã đăng nhập, chuyển hướng tới admin/khachhang
            return redirect('admin/sanpham');
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng tới admin/user/login
            return redirect('admin/user/login');
        }
    }
}