@extends('layouts.app')
@section('content')

<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder">{{$produits->nom }}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">100.000</span>
                    <span>{{$produits->prix }}</span>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />

                    <button class="btn btn-outline-dark flex-shrink-0 me-2" type="button">
                        <i class="bi-cart-plus me-1"></i> <!-- Icône pour ajouter au panier -->
                        Ajouter au panier
                    </button>

                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-credit-card me-1"></i> <!-- Icône pour payer maintenant -->
                        Payer maintenant
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Produits associés</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($cards as $card)
            <x-product-card :produit="$card" />
            @endforeach

        </div>
    </div>
</section>
@endsection