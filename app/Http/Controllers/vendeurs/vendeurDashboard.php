<?php

namespace App\Http\Controllers\vendeurs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vendeurDashboard extends Controller
{
    public function index(){
        return view('dashboard.vendeur.home');
    }

    public function logout(){
        Auth::guard('vendeur')->logout();

        return redirect()->route('vendeur.login');
    }
}
