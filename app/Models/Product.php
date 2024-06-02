<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // Ubah ke 'products' (jamak)
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'Product_Name',
        'Price',
        'Description',
        'image',
        'id_kategori',
        'barcode'
    ];

    // Model Product
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}
