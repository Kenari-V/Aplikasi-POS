<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $pagination = 10;
        if($request->input('search_product'))
        {
            $dataProduct = Product::where('nama_product','LIKE','%' .$request->query('search_product').'%')->paginate($pagination);
        }else {
            $dataProduct = Product::paginate($pagination);
        }

        return view('HalamanAdmin.product', ['product'=>$dataProduct]);
    }

    public function create()
    {
        $category = category::all();
        return view('HalamanAdmin.createProduct',['category' => $category]);
    }

    // public function search(Request $request)
    // {
    //     $products = Product::where('nama_product', 'LIKE', '%' . $request->search . '%')
    //         ->orWhere('harga_product', '=', $request->search)
    //         ->orWhere('barcode', '=', $request->search)
    //         ->get();

    //     return json_encode($products);
    // }

    public function tambahData(Request $request)
    {
        $this->validate($request,[
            'nama_product' => 'required',
            'harga_product' => 'required',
            'id_category' => 'required',
            'qty' => 'required',
            'barcode' => 'required',
            'photo_product'
        ]);

        $dataProduk = new Product();
        $dataProduk->nama_product = $request->nama_product;
        $dataProduk->harga_product = $request->harga_product;
        $dataProduk->qty = $request->qty;
        $dataProduk->id_category = $request->id_category;
        $dataProduk->barcode = $request->barcode;
        $dataProduk->photo_product = $request->photo_product;
        $checksave = $dataProduk->save();
        if($checksave){
            return redirect('/Product');
        }else {
            return redirect()->back();
        }
    }

    public function deleteProduct(Request $request)
    {
        $ids = $request->product_data;

        Product::whereIn('id_product', $ids)->delete();

        return redirect()->back();
    }

    public function editdataProduk($id_product)
    {
        $dataProduk = Product::find($id_product);
        $category = category::all();
        return view('HalamanAdmin.editproduct', ['category' => $category], compact (['dataProduk']));
    }

    public function updateProduk($id_product, Request $request)
    {
        $dataProduk = Product::find($id_product);
        $dataProduk->nama_product  = $request->nama_product;
        $dataProduk->harga_product = $request->harga_product;
        $dataProduk->qty = $request->qty;
        $dataProduk->id_category = $request->id_category;
        $dataProduk->barcode = $request->barcode;
        $dataProduk->photo_product = $request->photo_product;
        $checksave = $dataProduk->save();

        return redirect('/Product');
    }

}
