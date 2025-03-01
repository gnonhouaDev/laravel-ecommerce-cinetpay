<?php

namespace App\Http\Controllers;

use App\Models\ImageFile;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
        $produits = Produit::latest()->with('image')->get();
        return view('dashboard.vendeur.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('dashboard.vendeur.produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ], [
            'nom.required' => 'Le champ nom est obligatoire',
            'prix.required' => 'Le champ prix est obligatoire',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'Le fichier doit être de type: jpeg, png, jpg, gif, svg',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2MB',
        ]);

        try {
            DB::beginTransaction();

            // Création du produit
            $productCreate = Produit::create([
                'nom' => $request->nom,
                'prix' => $request->prix,
                'description' => $request->description,
                'vendeur_id' => auth()->guard('vendeur')->user()->id,
            ]);

            // Gestion de l'upload de l'image
            if ($request->hasFile('image')) {
                $filePath = $request->file('image')->store('produits', 'public'); // Stocke l'image dans le dossier `storage/app/public/produits`

                $imageFile = ImageFile::create([
                    'path' => $filePath,
                ]);

                // Associe l'image au produit
                $productCreate->image_file_id = $imageFile->id;
                $productCreate->save();
            }

            DB::commit();
            return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du produit: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $produits = Produit::findOrFail($id);

        $cards = Produit::latest()->paginate(4);
        
        return view('dashboard.vendeur.produits.show',['produits'=>$produits,'cards'=>$cards]);
    }
}