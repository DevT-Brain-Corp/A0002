<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $time = Carbon::now();

    	for($i = 1; $i <= 20; $i++){
 
            $k = $faker->numberBetween($min = 10, $max = 100);
            $h = $faker->numberBetween($min = 25000, $max = 30000);

    		DB::table('kasirs')->insert([
    			'kuantitas' => $k,
    			'harga' => $h,
                'total' => $k * $h,
                'created_at' => $time->year.'-'.($time->month-6).'-'.$i
    		]);
 
    	}
    }
}
