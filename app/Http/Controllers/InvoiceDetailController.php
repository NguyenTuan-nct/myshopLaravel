<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceDetailController extends Controller
{
    public function index($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $details = InvoiceDetail::with('product')->where('invoice_id', $invoiceId)->get();
        
        return view('admin.invoice_details.index', compact('invoice', 'details'));
    }

    public function create($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $products = SanPham::all();
        
        return view('admin.invoice_details.create', compact('invoice', 'products'));
    }

    public function store(Request $request, $invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);

        DB::transaction(function () use ($request, $invoice) {
            $totalAmount = 0;

            foreach ($request->product_id as $key => $product_id) {
                $quantity = $request->quantity[$key];

                $product = SanPham::find($product_id);
                if ($product) {
                    $invoiceDetail = new InvoiceDetail();
                    $invoiceDetail->invoice_id = $invoice->id;
                    $invoiceDetail->product_id = $product_id;
                    $invoiceDetail->quantity = $quantity;
                    $invoiceDetail->save();

                    // Cập nhật số lượng tồn kho sản phẩm
                    $product->TonKho -= $quantity;
                    $product->save();

                    // Cộng tổng thành tiền
                    $totalAmount += $product->GiaSanPham * $quantity;
                }
            }

            // Cập nhật tổng tiền của hóa đơn
            $invoice->total_amount = $totalAmount;
            $invoice->save();
        });

        return redirect()->route('invoice_details.index', $invoiceId)->with('success', 'Chi tiết hóa đơn được thêm thành công');
    }

    public function edit($invoiceId, $detailId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $detail = InvoiceDetail::findOrFail($detailId);
        $products = SanPham::all();

        return view('admin.invoice_details.edit', compact('invoice', 'detail', 'products'));
    }

    public function update(Request $request, $invoiceId, $detailId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $detail = InvoiceDetail::findOrFail($detailId);

        DB::transaction(function () use ($request, $detail) {
            // Khôi phục số lượng tồn kho sản phẩm cũ
            $oldProduct = SanPham::find($detail->product_id);
            if ($oldProduct) {
                $oldProduct->TonKho += $detail->quantity;
                $oldProduct->save();
            }

            // Cập nhật chi tiết hóa đơn với sản phẩm và số lượng mới
            $product = SanPham::find($request->product_id);
            if ($product) {
                $detail->product_id = $request->product_id;
                $detail->quantity = $request->quantity;
                $detail->save();

                // Cập nhật số lượng tồn kho sản phẩm mới
                $product->TonKho -= $request->quantity;
                $product->save();
            }
        });

        return redirect()->route('invoice_details.index', $invoiceId)->with('success', 'Chi tiết hóa đơn được cập nhật thành công');
    }

    public function destroy($invoiceId, $detailId)
    {
        $detail = InvoiceDetail::findOrFail($detailId);

        DB::transaction(function () use ($detail) {
            // Khôi phục số lượng tồn kho sản phẩm
            $product = SanPham::find($detail->product_id);
            if ($product) {
                $product->TonKho += $detail->quantity;
                $product->save();
            }

            $detail->delete();
        });

        return redirect()->route('invoice_details.index', $invoiceId)->with('success', 'Chi tiết hóa đơn được xóa thành công');
    }
}
