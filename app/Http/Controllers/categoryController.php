<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 10;
        if($request->input('search_category'))
        {
            $dataCategory = category::where('nama_category','LIKE','%' .$request->query('search_category').'%')->paginate($pagination);
        }else {
            $dataCategory = category::paginate($pagination);
        }

        return  view('HalamanAdmin.category', ['category'=>$dataCategory]);
    }

    public function categorytambah()
    {
        return view('HalamanAdmin.tambahcategory');
    }

    public function categoryDataAdd(Request $request)
    {
        $this->validate($request,[
            'nama_category' => 'required',
        ]);

        $dataCategory = new category();
        $dataCategory -> nama_category = $request->nama_category;
        $checksave = $dataCategory->save();
        if($checksave){
            return redirect('/Category');
        }else {
            return redirect()->back();
        }
    }

    public function categoryDelete(Request $request)
    {
        $ids = $request->category_data;

        category::whereIn('id_category', $ids)->delete();

        return redirect()->back();
    }

    public function editdataCategory($id_category)
    {
        $dataCategory = category::find($id_category);
        $product = category::all();
        return view('HalamanAdmin.editcategory', ['product' => $product], compact (['dataCategory']));
    }

    public function updateCategory($id_category, Request $request)
    {
        $dataCategory = category::find($id_category);
        $dataCategory->nama_category  = $request->nama_category;
        $checksave = $dataCategory->save();

        return redirect('/Category');
    }
}
