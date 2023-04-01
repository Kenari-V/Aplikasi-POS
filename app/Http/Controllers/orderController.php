<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $pagination = 10;
        $dataOrder = order::paginate($pagination);
        return view('kasir.order',['order'=>$dataOrder]);
    }
}
