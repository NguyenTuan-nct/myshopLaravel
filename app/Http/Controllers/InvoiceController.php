<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('admin.invoices.create');
    }

    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->customer_name = $request->customer_name;
        $invoice->total_amount = $request->total_amount;
        $invoice->save();

        return redirect()->route('invoices.index');
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->customer_name = $request->customer_name;
        $invoice->total_amount = $request->total_amount;
        $invoice->save();

        return redirect()->route('invoices.index');
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        return redirect()->route('invoices.index');
    }
}

