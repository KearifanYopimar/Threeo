<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $rows = DB::table('transactions')
        ->select('transactions.*')
        ->get();
        
        return view('backend.content.transaction.list', [
            'rows' => $rows
        ]);
    }

    public function printPDF($id)
    {
        $row = DB::table('item_transactions')
            ->join('transactions', 'item_transactions.id_transaction', '=', 'transactions.id')
            ->join('products', 'item_transactions.id_product', '=', 'products.id_produk')
            ->select(
                'item_transactions.*',
                'transactions.total',
                'transactions.code',
                'transactions.subtotal',
                'transactions.total',
                'products.barcode',
                'products.Product_Name')
            ->where('transactions.id', $id)
            ->get();


        if ($row === null) {
            abort(404);
        }

        //    use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = Pdf::loadView('backend.content.transaction.print-pdf', ['row' => $row])
            ->setPaper('A4');
        return $pdf->stream('Invoice ' . '.pdf');

    }
}
