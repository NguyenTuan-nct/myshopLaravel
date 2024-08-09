<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;

class KhachHangController extends Controller
{
    public function index()
    {
        $khachhangs = KhachHang::all();
        return view('admin.khachhang.index', compact('khachhangs'));
    }

    public function create()
    {
        return view('admin.khachhang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_khach_hang' => 'required|string|max:255',
            'dia_chi' => 'nullable|string|max:255',
            'so_dien_thoai' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        KhachHang::create($request->all());

        return redirect()->route('khachhang.index')->with('success', 'Khách hàng đã được thêm thành công!');
    }

    public function edit($id)
    {
        $khachhang = KhachHang::findOrFail($id);
        return view('admin.khachhang.edit', compact('khachhang'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'ten_khach_hang' => 'required|string|max:255',
            'dia_chi' => 'nullable|string|max:255',
            'so_dien_thoai' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        $khachhang = KhachHang::findOrFail($id);
        $khachhang->update($request->all());

        return redirect()->route('khachhang.index')->with('success', 'Khách hàng đã được cập nhật!');
    }

    public function destroy($id)
    {

        $khachhang = KhachHang::findOrFail($id);
        $khachhang->delete();

        return redirect()->route('khachhang.index')->with('success', 'Khách hàng đã được xóa!');
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['edit','destroy','create']);
    }
}