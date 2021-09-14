<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
    public function run()
    {
     
        // $Produit = new Produit();
        // $Produit->nom='T-shirt anime';
        // $Produit->prix_ht=23;
        // $Produit->description='T-shirt anime high quality';
        // $Produit->img='product1.jpg';
        // $Produit->category_id=9;
        // $Produit->save();
        

        
       
        Produit::factory()
                ->count(1)
                ->create();
       
    }
}
