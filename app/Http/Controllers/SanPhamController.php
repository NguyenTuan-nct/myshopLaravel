<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'destroy', 'create']);
    }*/

    public function viewsp() // Hiển thị danh sách sản phẩm
    {
        $sanphams = SanPham::all();
        return view('admin.sanpham.viewsp', ['sanphams' => $sanphams]);
    }

    public function create() // Tạo sản phẩm mới
    {
        return view('admin.sanpham.create');
    }

    public function store(Request $request) // Lưu sản phẩm mới
    {
        $validated = $request->validate([
            'LoaiSanPham' => 'required|string|max:255',
            'TenSanPham' => 'required|string|max:255',
            'GiaSanPham' => 'required|integer',
            'Anh' => 'required|string|max:255',
            'NgayNhap' => 'required|date',
            'TonKho' => 'required|integer',
            'MoTa' => 'required|string|max:255',
            'KhoHangId' => 'required|integer',
        ]);

        SanPham::create($validated); // Sử dụng Eloquent để tạo sản phẩm

        return redirect('admin/sanpham')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function edit($id) // Chỉnh sửa sản phẩm
    {
        $sanpham = SanPham::findOrFail($id); // Sử dụng Eloquent để tìm sản phẩm
        return view('admin.sanpham.edit', ['sanpham' => $sanpham]);
    }

    public function update(Request $request, $id) // Cập nhật sản phẩm
    {
        $validated = $request->validate([
            'LoaiSanPham' => 'required|string|max:255',
            'TenSanPham' => 'required|string|max:255',
            'GiaSanPham' => 'required|integer',
            'Anh' => 'required|string|max:255',
            'NgayNhap' => 'required|date',
            'TonKho' => 'required|integer',
            'MoTa' => 'required|string|max:255',
            'KhoHangId' => 'required|integer',
        ]);

        $sanpham = SanPham::findOrFail($id);
        $sanpham->update($validated); // Sử dụng Eloquent để cập nhật sản phẩm

        return redirect('admin/sanpham')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    public function destroy($id) // Xóa sản phẩm
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->delete(); // Sử dụng Eloquent để xóa sản phẩm
        return redirect('admin/sanpham')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
