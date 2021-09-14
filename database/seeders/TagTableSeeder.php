<?php

namespace Database\Seeders;
use App\Models\tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new tag();
        $tag1->nom = '#charachter';
        $tag1->save();

        $tag2 = new tag();
        $tag2->nom = '#logo';
        $tag2->save();

        $tag3 = new tag();
        $tag3->nom = '#fun';
        $tag3->save();
    }
}
