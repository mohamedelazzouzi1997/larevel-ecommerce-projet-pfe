<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                    // \App\Models\User::factory(10)->create();
            ProduitTableSeeder::class,
            OrderTableSeeder::class
        ]);
    }
}
