<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{

			User::create([
				'email' => 'monirforinfo@gmail.com',
				'password' => Hash::make('viQuardin3_mp3$'),
				'roll_id' => 1,
				'name' => 'Moniruzzaman Monir'
			]);
		
	}

}