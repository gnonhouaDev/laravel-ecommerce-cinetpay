@props(['produit'])

<div class="col mb-5">
    <a href="{{ route('produits.show',['id'=>$produit->id]) }}" style="text-decoration: none;color: inherit;">
    <div class="card h-100">
        <!-- Product image-->
         @if ($produit->image)
            <img class="card-img-top" src="{{ asset('storage/'. $produit->image->path) }}" alt="..." />
         @else
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
         @endif
        
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $produit->nom }}</h5>
                <!-- Product price-->
                {{ $produit->prix }}
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Acheter maintenant</a></div>
        </div>
    </div>
    </a>
</div>