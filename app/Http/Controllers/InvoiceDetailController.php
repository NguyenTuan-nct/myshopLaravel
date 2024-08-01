<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    public function index($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $details = $invoice->details;
        return view('admin.invoice_details.index', compact('invoice', 'details'));
    }

    public function create($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        return view('admin.invoice_details.create', compact('invoice'));
    }

    public function store(Request $request, $invoiceId)
    {
        $detail = new InvoiceDetail();
        $detail->invoice_id = $invoiceId;
        $detail->item_name = $request->item_name;
        $detail->quantity = $request->quantity;
        $detail->price = $request->price;
        $detail->save();

        return redirect()->route('invoice_details.index', $invoiceId);
    }

    public function edit($invoiceId, $id)
    {
        $invoice = Invoice::find($invoiceId);
        $detail = InvoiceDetail::find($id);
        return view('admin.invoice_details.edit', compact('invoice', 'detail'));
    }

    public function update(Request $request, $invoiceId, $id)
    {
        $detail = InvoiceDetail::find($id);
        $detail->item_name = $request->item_name;
        $detail->quantity = $request->quantity;
        $detail->price = $request->price;
        $detail->save();

        return redirect()->route('invoice_details.index', $invoiceId);
    }

    public function destroy($invoiceId, $id)
    {
        $detail = InvoiceDetail::find($id);
        $detail->delete();

        return redirect()->route('invoice_details.index', $invoiceId);
    }
}
