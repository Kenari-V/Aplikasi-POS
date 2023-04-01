<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        if(Auth::user()) {
            // if($user->level == '1'){
            //     return redirect()->intended('dashboard');
            // }elseif ($user->level == '2') {
            //     return redirect()->intended('kasir');
            // }

            return redirect('kasir');
        }

        return view('login.auth');
    }

    public function proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
            [
                'email' => 'Email tidak boleh kosong',
            ]
    );

    $kredensial = $request->only('email','password');

    if(Auth::attempt($kredensial)){
        $user = Auth::user();
        Auth::login($user,true);
        // if($user->level == '1'){
        //     return redirect()->intended('');
        // }elseif ($user->level == '2') {
        //     return redirect()->intended('kasircontroller');
        // }

        if($user->level){
            return redirect()->Route('layout');
        }

        return redirect()->intended('/');
    }

        return back()->withErrors([
            'email' => 'Maaf email atau password salah',
        ])->onlyInput('email');
    }

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}

public function register(Request $request)
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
    $checksave = $dataUsers->save();
    if($checksave){
        return redirect('/login');
        }
    }

}
