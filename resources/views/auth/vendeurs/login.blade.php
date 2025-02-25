@extends('layouts.app',['background'=>'#e3f2fd'])

@section('title','Inscription - Site E-commerce')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Auth/style.css') }}">

<div class="form-container">
    @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
    @endif

    <h2>Connectez votre compte <span style="color:rgba(84, 120, 212, 0.82);">Vendeur</span></h2>
    <form method="POST" action="{{ route('vendeur.handleLogin') }}">
        
        @method('POST')
        @csrf
        <!-- Email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-icon">
                <i class="fas fa-envelope "></i>
                <input type="email" class="form-control py-4" id="email" name="email" placeholder="Entrez votre email vendeur" value="{{ old('email') }}">

                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            
            </div>
        </div>

        <!-- Mot de passe -->
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-icon">
                <div class=""><i class="fas fa-lock"></i></div>
                <input type="password" class="form-control py-4" id="password" name="password" placeholder="Créez un mot de passe vendeur" value="{{ old('password') }}">
            
                @error('password')
                    <p class="alert alert-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Bouton d'inscription -->
        <button type="submit" class="btn btn-primary">S'inscrire</button>

        <!-- Lien de connexion -->
        <div class="text-center mt-3">
            <p>Je n'ai pas de compte <a href="{{ route('vendeur.register') }}">Inscrivez-vous ici</a></p>
        </div>
    </form>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>