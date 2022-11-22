<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( $status = false)
    {
        $sql = "SELECT * FROM invoices WHERE user_id = ". auth()->id();
        if ($status !== false) {
            $sql .= " AND status = " . (int) $status . " ORDER BY id";
        }
        $invoices = DB::select($sql);
 /*       $invoices = Invoice::query()->where('user_id', auth()->id());
        if ($status) {
            $invoices->where('status', $status);
        }
        $invoices->get();*/
        //dd($invoices);
        return view('invoice.index', compact('invoices'));
    }
}
