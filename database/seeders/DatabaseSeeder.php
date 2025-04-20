<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $c1 =  Category::create(['name' => 'Makanan']);
        $c2 = Category::create(['name' => 'Minuman']);

        Item::create([
            'name' => 'Ayam Goreng',
            'price' => 15000,
            'category_id' => $c1->id
        ]);
        Item::create([
            'name' => 'Tahu Sumedang',
            'price' => 2000,
            'category_id' => $c1->id
        ]);
        Item::create([
            'name' => 'Nasi Pecel',
            'price' => 25000,
            'category_id' => $c1->id
        ]);
        Item::create([
            'name' => 'Es Jeruk',
            'price' => 5000,
            'category_id' => $c2->id
        ]);
        Item::create([
            'name' => 'Es Teh',
            'price' => 2500,
            'category_id' => $c2->id
        ]);
    }
}
