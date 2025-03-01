<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $produits = Produit::latest()->paginate(8);
        return view('welcome',compact('produits'));
    }
}
