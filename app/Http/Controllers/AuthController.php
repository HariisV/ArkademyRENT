<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginProses(Request $request)
    {
        if (Auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('shop');
        }else {
            return redirect()->back()->with(['warning' => 'Email Atau Password Salah']);
        }
        // return $request->all();
    }
    public function user()
    {
        $user = User::where('id', '!=', Auth()->user()->id)->get();
        return view('User.index',compact('user'));
    }
    public function create(Request $request)
    {
        if ($request['level'] == null) {
            $request['level'] = "user";
        }
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('login');
    }
    public function daftar()
    {
        return view('daftar');
    }
    public function logout()
    {
        Auth()->logout();
        return redirect('/Login');
    }

    public function deleteUser($id)
    {
        $Transaksi = Transaksi::where('user_id', $id)->delete();
        user::where('id', $id)->delete();
        return redirect()->back();
    }
    
}
