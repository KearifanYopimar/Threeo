<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HalamanController extends Controller
{
    public function product()
    {
        $kategori = Kategori::all();
        $prodcut = Product::all();
        return view('frontend.content.page.product', compact('kategori', 'prodcut'));
    }

    public function simpan(Request $request)
    {
        $data = new Order();
        $data->kode_order = "OD-" . rand(1000, 9999);
        $data->nama_customers = $request->nama_customers;
        $data->kategories_id = $request->kategories_id;
        $data->product_id = $request->product_id;
        $data->save();

        return redirect()->route('home.index');
    }

    public function transaction()
    {
        $detailTransaction = DB::table('item_transactions')
            ->select('item_transactions.*', 'transactions.code', 'transactions.date')
            ->join('transactions', 'item_transactions.id_transaction', '=', 'transactions.id')
            ->get();


        return view('frontend.content.page.transaction', compact('detailTransaction'));
    }
}
