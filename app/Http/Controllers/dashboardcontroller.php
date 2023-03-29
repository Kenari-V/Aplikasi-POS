<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        $totalorder = order::count();
        $totalcustomer = customer::count();
        $totalproduk = Product::count();
        return view('HalamanAdmin.dashboard', ['user'=>$dataUser], compact('totalorder', 'totalcustomer', 'totalproduk'));
    }
}
