<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = "id_category";
    public $timestamps = false;


    public function Product()
    {
        return $this->hasMany(Product::class,'id_category','id_category');
    }
}
