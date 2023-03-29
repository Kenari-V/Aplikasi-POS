<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = "id_product";
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(category::class,'id_category','id_category');
    }
}
