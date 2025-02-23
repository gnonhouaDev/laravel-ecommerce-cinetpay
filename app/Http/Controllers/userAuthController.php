<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
class userAuthController extends Controller
{
    //Register
    public function register(){
        return view('auth.users.register');
    }

    public function handleRegister(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4|max:12',
        ],[
            'name.required'=>'le champ nom est obligatoire',
            'email.required'=>'le champ email est obligatoire',
            'email.unique'=>'cet email est déjà utilisé',
            'password'=>'le champ mot de passe doit avoir 4 caracteres minimum ',
        ]);

        try {
            $userRegister = User::create($request->all());
            return redirect()->route('user.register')->with('success','l\'utilisateur a été créé avec succès');
        } catch (Exception) {
            return redirect()->route('user.register')->with('error','une erreur est survenue lors de la création de l\'utilisateur');
        }
        

    }

    //Login
    public function login(){
        return view('auth.users.login');
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
            if(auth()->attempt($request->only('email','password'))){
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('error','email ou mot de passe incorrect');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error','une erreur est survenue lors de la connexion'.$e->getMessage());
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
