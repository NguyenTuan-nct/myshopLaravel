<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        // Lấy tất cả hóa đơn
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        // Lấy danh sách khách hàng và sản phẩm
        $customers = KhachHang::all();
        $products = SanPham::all();
        return view('admin.invoices.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            // Khởi tạo tổng số tiền
            $totalAmount = 0;

            // Tạo hóa đơn mới và lưu trước
            $invoice = new Invoice();
            $invoice->customer_id = $request->customer_id;
            $invoice->created_at = now();
            $invoice->updated_at = now();
            $invoice->save();  // Lưu hóa đơn để có `invoice_id`

            // Lưu thông tin chi tiết hóa đơn từ các input ẩn
            foreach ($request->product_id as $key => $product_id) {
                $quantity = $request->quantity[$key];

                // Tìm sản phẩm để lấy giá
                $product = SanPham::find($product_id);
                if ($product) {
                    $productPrice = $product->GiaSanPham;
                    $totalAmount += $productPrice * $quantity; // Tính tổng số tiền

                    // Tạo chi tiết hóa đơn
                    $invoiceDetail = new InvoiceDetail();
                    $invoiceDetail->invoice_id = $invoice->id; // Sử dụng `id` của invoice đã lưu
                    $invoiceDetail->product_id = $product_id;
                    $invoiceDetail->quantity = $quantity;
                    $invoiceDetail->created_at = now();
                    $invoiceDetail->updated_at = now();
                    $invoiceDetail->save();

                    // Cập nhật số lượng tồn kho sản phẩm
                    $product->TonKho -= $quantity;
                    $product->save();
                }
            }

            // Cập nhật tổng tiền vào hóa đơn sau khi tính toán
            $invoice->total_amount = $totalAmount;
            $invoice->save(); // Cập nhật hóa đơn với tổng tiền
        });

        return redirect()->route('invoices.index')->with('success', 'Hóa đơn được tạo thành công');
    }

    /*public function edit($id)
    {
        // Tìm hóa đơn theo ID
        $invoice = Invoice::find($id);
        $customers = KhachHang::all();
        $products = SanPham::all();
        $invoiceDetails = $invoice->details; // Lấy chi tiết hóa đơn hiện tại
        return view('admin.invoices.edit', compact('invoice', 'customers', 'products', 'invoiceDetails'));
    }*/

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            // Tìm hóa đơn
            $invoice = Invoice::find($id);
            $invoice->customer_id = $request->customer_id;
            $invoice->updated_at = now();

            // Khởi tạo tổng số tiền
            $totalAmount = 0;

            // Cập nhật chi tiết hóa đơn
            $invoice->details()->delete(); // Xóa chi tiết cũ trước

            // Tạo chi tiết mới
            foreach ($request->product_id as $key => $product_id) {
                $quantity = $request->quantity[$key];

                // Tìm sản phẩm để lấy giá
                $product = SanPham::find($product_id);
                if ($product) {
                    $productPrice = $product->GiaSanPham;
                    $totalAmount += $productPrice * $quantity; // Tính tổng số tiền

                    $invoiceDetail = new InvoiceDetail();
                    $invoiceDetail->invoice_id = $invoice->id;
                    $invoiceDetail->product_id = $product_id;
                    $invoiceDetail->quantity = $quantity;
                    $invoiceDetail->created_at = now();
                    $invoiceDetail->updated_at = now();
                    $invoiceDetail->save();

                    // Cập nhật số lượng tồn kho sản phẩm
                    $product->TonKho -= $quantity;
                    $product->save();
                }
            }

            // Cập nhật tổng số tiền trong hóa đơn
            $invoice->total_amount = $totalAmount;
            $invoice->save();
        });

        return redirect()->route('invoices.index')->with('success', 'Hóa đơn được cập nhật thành công');
    }

    public function destroy($id)
    {
        // Xóa hóa đơn và chi tiết hóa đơn
        $invoice = Invoice::find($id);
        $invoice->details()->delete(); // Xóa chi tiết hóa đơn trước
        $invoice->delete(); // Xóa hóa đơn

        return redirect()->route('invoices.index')->with('success', 'Hóa đơn được xóa thành công');
    }
}
