<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $pagination = 10;
        $dataUser = User::all();
        $order = order::paginate($pagination);
        $totalorder = order::count();
        $totalcustomer = customer::count();
        $totalproduk = Product::count();
        $total_harga = orderdetail::select(DB::raw("CAST(SUM(harga_product) as int) as total_harga"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_harga');

        $bulan = orderdetail::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        $total_harian = orderdetail::select(DB::raw("CAST(SUM(harga_product) as int) as total_harian"))
        ->GroupBy(DB::raw("Day(created_at)"))
        ->pluck('total_harian');

        $harian = orderdetail::select(DB::raw("DAYNAME(created_at) as harian"))
        ->GroupBy(DB::raw("DAYNAME(created_at)"))
        ->pluck('harian');


        return view('HalamanAdmin.dashboard', ['user'=>$dataUser, 'order'=>$order], compact('totalorder', 'totalcustomer', 'totalproduk','total_harga','bulan','total_harian','harian'));
    }
}
