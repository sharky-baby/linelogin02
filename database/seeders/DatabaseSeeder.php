<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
        $this->call(ProductsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        // 他のシーダーも呼び出す場合は、ここに追加します。

    }
}
