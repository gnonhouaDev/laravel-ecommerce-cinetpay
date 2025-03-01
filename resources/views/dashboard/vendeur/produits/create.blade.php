@extends('layouts.app-dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Mes Produits</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Affichage de la liste des produits</li>
    </ol>
    <div class="card my-4 p-3">
        <div class="card-header">Formulaire d'ajout de produit</div>
        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="image" class="form-label">Image du produit</label>
                    <input type="file" class="form-control" id="image" name="image" accept=".png,jpg">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="nom" class="form-label">Nom produit</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom du produit">
                    @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix du produit">
                    @error('prix')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary p-2" style="width: 100%; font-size: 1.1rem; font-weight: 500;">Enregistrez un Produit</button>
            </form>
        </div>
    </div>
</div>
@endsection