<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        $values = [ '指定なし', '食べ物', 'スポーツ', 'ファッション', '音楽' ];
        $categories = [];
        for ($i=0; $i < count($values); $i++) { 
            $categories[$i] = [
                'name' => $values[$i],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
