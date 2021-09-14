<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        // $category = new Category();
        // $category->nom = 'Films';
        // $category->is_online = 1;
        // $category->save();

        // $category2 = new Category();
        // $category2->nom = 'Series Tv3';
        // $category2->is_online = 1;
        // $category2->save();

        // $category3 = new Category();
        // $category3->nom = 'Jeux Videos';
        // $category3->is_online = 1;
        // $category3->save();

        // $category4 = new Category();
        // $category4->nom = 'Sport';
        // $category4->is_online = 1;
        // $category4->save();

        
        // $category5 = new Category();
        // $category5->nom = 'Music';
        // $category5->is_online = 1;
        // $category5->save();


        $category5 = new Category();
        $category5->nom = 'one piece';
        $category5->is_online = 1;
        $category5->parent_id = 12;
        $category5->save();

        $category6 = new Category();
        $category6->nom = 'dragon ball';
        $category6->is_online = 1;
        $category6->parent_id = 12;
        $category6->save();

        $category7 = new Category();
        $category7->nom = 'death note';
        $category7->is_online = 1;
        $category7->parent_id = 12;
        $category7->save();

        $category8 = new Category();
        $category8->nom = 'death note';
        $category8->is_online = 1;
        $category8->parent_id = 12;
        $category8->save();

        $category9 = new Category();
        $category9->nom = 'interstellar';
        $category9->is_online = 1;
        $category9->parent_id = 9;
        $category9->save();

        $category10 = new Category();
        $category10->nom = 'venom';
        $category10->is_online = 1;
        $category10->parent_id = 9;
        $category10->save();

        
        $category11 = new Category();
        $category11->nom = 'lost';
        $category11->is_online = 1;
        $category11->parent_id =10;
        $category11->save();

        $category12 = new Category();
        $category12->nom = 'breaking bad';
        $category12->is_online = 1;
        $category12->parent_id =10;
        $category12->save();

        $category13 = new Category();
        $category13->nom = 'GTA';
        $category13->is_online = 1;
        $category13->parent_id =11;
        $category13->save();

        $category14 = new Category();
        $category14->nom = 'league of legends';
        $category14->is_online = 1;
        $category14->parent_id =11;
        $category14->save();

    }
}
