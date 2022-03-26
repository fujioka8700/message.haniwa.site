<?php

namespace Database\Seeders;

use Dflydev\DotAccessData\Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        $values = [];
        for ($i=1; $i <= 100; $i++) { 
            $values[] = [
                'title'      => "title_{$i}",
                'body'       => "body_{$i}",
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        DB::table('messages')->insert($values);
    }
}
