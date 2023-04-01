<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class rolecontroller extends Controller
{
    public function index(Request $request)
    {
        $pagination = 10;
        if($request->input('search_users'))
        {
            $dataUsers = User::where('name','LIKE','%' .$request->query('search_users').'%')->paginate($pagination);
        }else {
            $dataUsers = User::paginate($pagination);
        }
        return view('HalamanAdmin.role',['users'=>$dataUsers] );
    }

    public function deleteUser(Request $request)
    {
        $ids = $request->users_data;

        User::whereIn('id_users', $ids)->delete();

        return redirect()->back();
    }

    public function editdataUsers($id_users)
    {
        $dataUsers = User::find($id_users);
        return view('HalamanAdmin.editusers', compact(['dataUsers']));
    }

    public function updateUsers($id_users, Request $request)
    {
        $dataUsers = User::find($id_users);
        $dataUsers->name = $request->name;
        $dataUsers->email = $request->email;
        $dataUsers->password = bcrypt($request->password);
        $dataUsers->photo_profile = $request->photo_profile;
        $dataUsers->level = $request->level;
        $checksave = $dataUsers->save();

        return redirect('/Role');
    }

    public function addUsers(Request $request)
    {
        return view('HalamanAdmin.tambahUsers',[]);
    }

    public function tambahUsers(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'level' => 'required'
         ]);

         $dataUsers = new User();
         $dataUsers->name = $request->name;
         $dataUsers->email = $request->email;
         $dataUsers->password = bcrypt($request->password);
         $dataUsers->level = $request->level;
         $dataUsers->photo_profile = $request->photo_profile;
         $checksave = $dataUsers->save();
         if($checksave){
             return redirect('/Role');
             }
    }
}
