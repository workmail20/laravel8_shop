<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++) {
            $user = User::factory()->make();
            DB::table('products')->insert([
                'title' => 'Product_'.$i,
                'price' => rand(200, 1500),
                'in_stock' => 1,
                'description' => $user->realtext
            ]);
        }
    }
}
