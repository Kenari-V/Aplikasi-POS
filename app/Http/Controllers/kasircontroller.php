<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\customer;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kasircontroller extends Controller
{
    public function index()
    {

        $pagination = 6;
        $dataCategory = category::all();
        $dataProduct = Product::paginate($pagination);
        $dataCustom = customer::all();
        $cartData = cart::all();
        $total_bayar = 0;
        foreach ($cartData as $cd){
            $total_bayar += $cd->harga_product * $cd->qty;
        }
        return view('kasir.kasir',['product'=>$dataProduct, 'category'=>$dataCategory, 'dataCustomer' => $dataCustom , 'cartData' => $cartData, 'total_bayar' => $total_bayar]);
    }

    public function addCart(Request $request)
    {
        // $orderitem = new order();
        // $orderitem -> id_order = $request->id_order;
        // $orderitem -> id_customer = $request->id_customer;
        // $orderitem -> jumlah_bayar = $request->jumlah_bayar;
        // $orderitem -> kembalian = $request->kembalian;
        // if ($request->type == 'delete-item'){
        //     $cart = cart::where('id_cart',$request->id_product)->first();
        //     $cart->delete();
        // }
        $product = Product::find($request->id_product);
        if (!$product){
            $product = Product::where('barcode',$request->id_product)->first();
            if (!$product){
                return response()->json(['status' => 'error' , 'message' => 'product tidak ditemukan'],404);
            } else {
                $request->id_product = $product->id_product;
            }
        }

        $cart = cart::where('id_product',$request->id_product)->first();
        if (!$cart){
            $cart = new cart();
            $cart->id_product = $request->id_product;
            $cart->id_customer = $request->id_customer;
            $cart->nama_product = '-';
            $cart->harga_product = $product->harga_product;
            $cart->qty = 1;
            $cart->stock = 0;
            $cart->save();
            $cart_id = $cart->id_cart;
        } else {
            $qty = 0;
            if ($request->type == 'item-click'){
                $qty = $cart->qty + 1;
            } else if ($request->type == 'decrease-item'){
                $qty = $cart->qty - 1;
            } else if ($request->type == 'increase-item'){
                $qty = $cart->qty + 1;
            }
            $cart->nama_product = '-';
            $cart->harga_product = $product->harga_product;
            $cart->qty = $qty;
            $cart->stock = 0;
            $cart->save();
            $cart_id = $cart->id_cart;

            if ($qty == 0 || $request->type == 'delete'){
                $cart->delete();
            }
        }

        $sum_cart = cart::selectRaw('SUM(harga_product * qty) as total_bayar')->first();

        return response()->json(['Message' => 'Data berhasil ditambahkan' ,'status' => 'success' ,'cart_id' => $cart_id , 'cart' => $cart , 'product' => $product , 'total_bayar' => $sum_cart->total_bayar]);

    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $order = new order();
        $order->id_customer = $request->id_customer;
        $order->jumlah_bayar = $request->uang_tunai;
        $order->kembalian = 0;
        $order->save();

        $total_bayar = 0;

        $cart = cart::all();
        foreach ($cart as $c){
            $order_detail = new orderdetail();
            $order_detail->id_order = $order->id_order;
            $order_detail->id_product = $c->id_product;
            $order_detail->qty = $c->qty;
            $order_detail->harga_product = $c->harga_product;
            $order_detail->save();

            $total_bayar += $c->harga_product * $c->qty;
            $c->delete();

        }

        $order->kembalian = $order->jumlah_bayar - $total_bayar;
        $order->save();
        DB::commit();

        return view('kasir.struk',['order' => $order , 'order_detail' => $order_detail ,'total_bayar' => $total_bayar ]);

    }

    public function addcustomer ()
    {
        return view('kasir.tambahCustomerkasir');
    }

    public function tambahcustomer (Request $request)
    {
        $this->validate($request,[
            'nama_customer' => 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);

        $dataCustomer = new customer();
        $dataCustomer -> nama_customer = $request->nama_customer;
        $dataCustomer -> contact = $request->contact;
        $dataCustomer -> address = $request->address;
        $checksave = $dataCustomer->save();
        if($checksave){
            return redirect('/kasir');
        }else{
            return redirect()->back();
        }
    }
}
