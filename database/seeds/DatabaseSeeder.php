<?php
//php artisan db:seed

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
        DB::table('compounds')->insert([
    	  	'compound_name'=> str_random(10),
    	  	'structure'=>str_random(10),
            'chemist'=>str_random(10),
    	  	'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]);
        DB::table('methods')->insert([
            'compound_id' => 1,
            'test_area' => str_random(10),
            'test_title' => str_random(10),
            'test_day' => str_random(10),
            'test_scale' => str_random(10),
            'concentration' => str_random(10),
            'conc_unit' => str_random(10),
        ]);
        DB::table('paddies')->insert([
            'compound_id' => 1,
            'method_id'=> 1,
            'mode_of_action'=> str_random(10),
            'ECHCG'=> rand(0,100),
            'ORYSP_1'=> rand(0,100),
            'ORYSP_3'=> rand(0,100),
            'symptom'=> str_random(10),
            'comment'=> str_random(10),
            'author'=> str_random(10),
            'updater'=> str_random(10),
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
          
        ]);
        DB::table('uplands')->insert([
            'compound_id' => 1,
            'method_id'=> 1,
            'mode_of_action'=> str_random(10),
            'ECHUT'=> rand(0,100),
            'DIGAD'=> rand(0,100),
            'ZEAMD'=> rand(0,100),
            'TRZAX'=> rand(0,100),
            'symptom'=> str_random(10),
            'comment'=> str_random(10),
            'author'=> str_random(10),
            'updater'=> str_random(10),
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ]);
    }
}
