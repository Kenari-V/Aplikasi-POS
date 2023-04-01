<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\orderdetail;
class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    public $timestamps = false;
    public function customer()
    {
        return $this->belongsTo(customer::class , 'id_customer' , 'id_customer');
    }

    public function orderDetail()
    {
        return $this->hasMany(orderdetail::class , 'id_order' , 'id_order');
    }
}
