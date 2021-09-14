<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class produitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product1.jpg';
        $Produit->category_id=9;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product2.jpg';
        $Produit->category_id=10;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product3.jpg';
        $Produit->category_id=11;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product4.jpg';
        $Produit->category_id=12;
        $Produit->save();
        
        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product5.jpg';
        $Produit->category_id=13;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product6.jpg';
        $Produit->category_id=9;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product7.jpg';
        $Produit->category_id=10;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product8.jpg';
        $Produit->category_id=11;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product9.jpg';
        $Produit->category_id=12;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt anime';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product10.jpg';
        $Produit->category_id=13;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt game';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product19.jpg';
        $Produit->category_id=11;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt game';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product20.jpg';
        $Produit->category_id=11;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt game';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product21.jpg';
        $Produit->category_id=11;

        $Produit = new Produit();
        $Produit->nom='T-shirt game';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product22.jpg';
        $Produit->category_id=11;
        $Produit->save();
        

        $Produit = new Produit();
        $Produit->nom='T-shirt Tv show';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product23.jpg';
        $Produit->category_id=10;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt Tv show';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product24.jpg';
        $Produit->category_id=10;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt film';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product25.jpg';
        $Produit->category_id=9;
        $Produit->save();

        $Produit = new Produit();
        $Produit->nom='T-shirt film';
        $Produit->prix_ht=$this->faker->randomNumber(2);
        $Produit->description=$this->faker->text(40);
        $Produit->img='product26.jpg';
        $Produit->category_id=9;
        $Produit->save();
        return [
     

            // 'nom' => $this->faker->text(8),
            // 'prix_ht' => $this->faker->randomNumber(2),
            // 'description' => $this->faker->text(40),
            // 'img' => "product1.jpg",
            // 'category_id' => 1,

        
            
        ];
    }
}
