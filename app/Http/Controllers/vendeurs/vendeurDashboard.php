<?php

namespace App\Http\Controllers\vendeurs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vendeurDashboard extends Controller
{
    public function index(){
        return 'Le vendeur est connecté';
    }
}
