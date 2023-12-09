<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Userss;
class LoginController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('register');
        }
    }
    public function actionlogin(Request $request)
    {
        $credentials = $request->only('name', 'nomor_sim');

    $user = Userss::where('name', $credentials['name'])->first(); // Menambahkan ->first()

    if ($request->name==$user['name']&& $request->nomor_sim ==$user['nomor_sim']) {
       
        return redirect('/home');
    } else {
        
        Session::flash('error', 'No_SIM atau Name salah');
        return redirect('/login');
    }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function storeuser(Request $request){
        Userss::create($request->all());
        return redirect('/login');
    }

}
