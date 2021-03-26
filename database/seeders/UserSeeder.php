<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DateTime;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('users')->insert([
    			'name' => $faker->name,
    			'email' => $faker->email,
          'level' => 'user',
          'verification' => '1',
          'verification_token' => '',
          'expired_token' =>  null,
          'email_verified_at' => Carbon::now(),
          'password' => bcrypt($faker->email),
          'remember_token' => '',
          'created_at' =>  Carbon::now(),
          'updated_at' =>  Carbon::now()
    		]);
 
    	}
    }
}
