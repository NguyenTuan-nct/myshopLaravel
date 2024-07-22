<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SanPhamController extends Controller
{
    public function viewsp()// tên
    {
        $sanphams = DB::table('SanPham')->get();
        return view('sanpham.viewsp', ['sanphams' => $sanphams]);
    }

    public function create()
    {
        return view('sanpham.create');
    }
    
    public function store(Request $request)
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

        DB::table('SanPham')->insert($validated);

        return redirect('/sanpham')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function destroy($id)
    {
        DB::table('SanPham')->where('SanPhamId', $id)->delete();
        return redirect('/sanpham')->with('success', 'Sản phẩm đã được xóa thành công!');
    }

    public function edit($id)
    {
        $sanpham = DB::table('SanPham')->where('SanPhamId', $id)->first();
        return view('sanpham.edit', ['sanpham' => $sanpham]);
    }
     public function update(Request $request, $id)
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

        DB::table('SanPham')->where('SanPhamId', $id)->update($validated);

        return redirect('/sanpham')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
}
