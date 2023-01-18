<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(5)->create();
        \App\Models\Book::factory(10)->create();


        // Category::truncate();

        // $this->call([
        //     CategorySeeder::class,
        //     BookSeeder::class
        // ]);
    }
}
