<?php

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
            'author'=>str_random(10),
    	  	'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]);
        DB::table('method')->insert([
            'compound_name'=> str_random(10),
            'structure'=>str_random(10),
            'author'=>str_random(10),
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
            'compound_id' => 'required',
            'test_area' => 'required',
            'test_title' => 'required',
            'test_day' => 'required',
            'test_scale' => 'required',
            'concentration' => 'required',
            'conc_unit' => 'required',
        ]);
        DB::table('compounds')->insert([
            'compound_name'=> str_random(10),
            'structure'=>str_random(10),
            'author'=>str_random(10),
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]);
        DB::table('compounds')->insert([
            'compound_name'=> str_random(10),
            'structure'=>str_random(10),
            'author'=>str_random(10),
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]);
    }
}
