@extends('layouts.app',['background'=>'#e3f2fd'])

@section('title','Inscription - Site E-commerce')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Auth/style.css') }}">

<div class="form-container">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <h2>Créez votre compte</h2>
    <form method="POST" action="{{ route('user.handleRegister') }}">
        
        @method('POST')
        @csrf
        <!-- Nom complet -->
        <div class="form-group">
            <label for="fullName">Nom complet</label>
            <div class="input-icon ">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control py-4" id="fullName" name="name" placeholder="Entrez votre nom complet" value="{{ old('name') }}">

                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror


            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-icon">
                <i class="fas fa-envelope "></i>
                <input type="email" class="form-control py-4" id="email" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">

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
                <input type="password" class="form-control py-4" id="password" name="password" placeholder="Créez un mot de passe" value="{{ old('password') }}">
            
                @error('password')
                    <p class="alert alert-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Bouton d'inscription -->
        <button type="submit" class="btn btn-primary">S'inscrire</button>

        <!-- Lien de connexion -->
        <div class="text-center mt-3">
            <p>Déjà inscrit ? <a href="{{ route('user.handleUserLogin') }}">Connectez-vous ici</a></p>
        </div>
    </form>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>