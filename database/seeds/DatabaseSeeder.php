<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10000; $i++){
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('users')->insert([
    			'name' => $faker->name,
    			'username' => $faker->name,
    			'email' => $faker->email,
    			'password' =>  Hash::make($faker->name),
    			'level' =>3.
    		]);
 
    	}
    }
}
