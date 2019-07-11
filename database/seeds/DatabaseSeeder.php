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
    }
}
