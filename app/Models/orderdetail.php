<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class orderdetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_orderdetail';
    protected $table = 'orderdetail';

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product' , 'id_product');
    }
}
