<?php

namespace Database\Seeders;

use App\Models\Product; //追加
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Productモデルのファクトリーを使ってダミーレコードを10件作成
        Product::factory()->count(10)->create();
    }
}
