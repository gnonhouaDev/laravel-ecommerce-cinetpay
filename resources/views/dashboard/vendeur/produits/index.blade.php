@extends('layouts.app-dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Mes Produits</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Affichage de la liste des produits</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header" style="display: flex;justify-content: flex-end;">
            <a href="{{ route("produits.create") }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i>Ajouter un produit</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th></th>
                        <th>Libelle</th>
                        <th>Prix</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Libelle</th>
                        <th>Prix</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($produits as $produit )
                    <tr>
                        <td>
                            <div class="" style="width: 50px; height: 50px;background-position:center;background-size:cover;overflow:hidden;">
                                @if($produit->image)
                                <div style='background-image: url("{{ asset('storage/'. $produit->image->path) }}"); width: 100%; height: 100%;'></div>
                                @endif
                            </div>
                        </td>

                        <td>{{ $produit->nom }}</td>
                        <!-- <td>description</td> -->
                        <td>{{ $produit->prix }}</td>
                        <td>{{ $produit->active ? 'Disponible':'Rupture de stock' }}</td>
                        <td></td>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection