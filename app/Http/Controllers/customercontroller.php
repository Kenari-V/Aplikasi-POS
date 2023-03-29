<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\customer;
use Illuminate\Http\Request;

class customercontroller extends Controller
{
    public function index(Request $request)
    {
        $pagination = 10;
        if($request->input('search_customer'))
        {
            $dataCustomer = customer::where('nama_customer','LIKE','%' .$request->query('search_customer').'%')->paginate($pagination);
        }else {
            $dataCustomer = customer::paginate($pagination);
        }
        return view('HalamanAdmin.customer', ['customer'=>$dataCustomer]);
    }

    public function tambahCustomer(Request $request)
    {
        return view('HalamanAdmin.tambahCustomer');
    }

    public function customerAdd(Request $request)
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
            return redirect('/Customer');
        }else{
            return redirect()->back();
        }
    }

    public function deleteCustomer(Request $request)
    {
        $ids = $request->customer_data;

        customer::whereIn('id_customer', $ids)->delete();

        return redirect()->back();
    }

    public function editdataCustomer($id_customer)
    {
        $dataCustomer = customer::find($id_customer);
        return view('HalamanAdmin.editcustomer', compact (['dataCustomer']));
    }

    public function updateCustomer($id_customer, Request $request)
    {
        $dataCustomer = customer::find($id_customer);
        $dataCustomer->nama_customer  = $request->nama_customer;
        $dataCustomer-> contact = $request->contact;
        $dataCustomer-> address = $request->address;
        $checksave = $dataCustomer->save();

        return redirect('/Customer');
    }
}
