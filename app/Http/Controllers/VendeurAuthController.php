<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendeur;
use Exception;

class VendeurAuthController extends Controller
{
    public function login(){
        return view('auth.vendeurs.login');
    }

    public function register(){
        return view('auth.vendeurs.register');
    }

    public function handleRegister(Request $request){
        //validation
        $request->validate([
            'nom'=>'required',
            'email'=>'required|email|unique:vendeurs',
            'password'=>'required|min:4|max:12',
            
            
        ],[
            'nom.required'=>'le champ nom est obligatoire',
            'email.required'=>'le champ email est obligatoire',
            'email.unique'=>'cet email est déjà utilisé',
            'password'=>'le champ mot de passe doit avoir 4 caracteres minimum ',
        ]);

        try {
            Vendeur::create($request->all());
            return redirect()->route('vendeur.handleLogin')->with('success','vendeur créé avec succès');

        } catch (Exception $e) {
            return redirect()->route('vendeur.handleLogin')->with('error','vendeur n\'est pas créé avec succès');
        }
    }

    public function handleLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4',
        ],[
            'email'=>'le champ email est obligatoire',
            'password'=>'le champ mot de passe doit avoir 4 caracteres minimum ',
        ]);

        try {
            if(auth('vendeur')->attempt($request->only('email','password'))){
                return redirect()->route('vendeur.dashboard');
            }else{
                return redirect()->back()->with('error','email ou mot de passe incorrect');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error','une erreur est survenue lors de la connexion'.$e->getMessage());
        }
    }


}
