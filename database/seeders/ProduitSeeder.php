<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        DB::table('produits')->insert([
            // 5 produits pour le vendeur_id = 1
            [
                'nom' => 'Ordinateur Portable',
                'description' => 'Un PC performant pour le travail et le divertissement.',
                'prix' => 500000,
                'active' => true,
                'vendeur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Smartphone',
                'description' => 'Un téléphone intelligent avec une excellente caméra.',
                'prix' => 300000,
                'active' => true,
                'vendeur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Casque Bluetooth',
                'description' => 'Casque sans fil avec réduction de bruit.',
                'prix' => 150000,
                'active' => false,
                'vendeur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Clavier Mécanique',
                'description' => 'Clavier rétroéclairé avec switchs mécaniques.',
                'prix' => 120000,
                'active' => true,
                'vendeur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Écouteurs sans fil',
                'description' => 'Écouteurs Bluetooth avec boîtier de charge.',
                'prix' => 80000,
                'active' => true,
                'vendeur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 5 produits pour le vendeur_id = 2
            [
                'nom' => 'Tablette Graphique',
                'description' => 'Idéale pour le dessin numérique et la retouche photo.',
                'prix' => 200000,
                'active' => true,
                'vendeur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Souris Gamer',
                'description' => 'Souris avec capteur haute précision et RGB.',
                'prix' => 70000,
                'active' => true,
                'vendeur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Moniteur 4K',
                'description' => 'Écran UHD avec taux de rafraîchissement élevé.',
                'prix' => 450000,
                'active' => true,
                'vendeur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Caméra de Sécurité',
                'description' => 'Caméra HD avec vision nocturne et détection de mouvement.',
                'prix' => 180000,
                'active' => true,
                'vendeur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Batterie Externe',
                'description' => 'Chargeur portable haute capacité 20000mAh.',
                'prix' => 90000,
                'active' => false,
                'vendeur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
