<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProductController extends Controller
{

    // ProductController
    public function index()
    {
        $products = Product::with('kategori')->get(); // Mengambil produk dengan data kategori terkait
        return view('backend.content.product.list', compact('products'));
    }

    public function tambah()
    {
        // Fetch all categories
        $kategori = Kategori::all();

        return view('backend.content.product.formTambah', compact('kategori'));
    }

    public function prosesTambah(Request $request)
    {
        try {
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'Product_Name' => 'required|string|max:255',
                'Price' => 'required|numeric|min:0',
                'Description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'id_kategori' => 'required|exists:kategori,id_kategori', // Ubah ke id_kategori yang sesuai dengan database
            ]);

            // Proses penyimpanan data produk
            $product = new Product();
            $product->Product_Name = $validatedData['Product_Name'];
            $product->Price = $validatedData['Price'];
            $product->Description = $validatedData['Description'];
            $product->id_kategori = $validatedData['id_kategori'];

            // Proses upload gambar (jika ada)
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $product->image = str_replace('public/', '', $imagePath);
            }

            // Simpan data produk ke dalam database
            $product->save();

            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }
}
