<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArtistsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 8) as $index)
		{
			Artist::create([
				'name' => $faker->name,
				'avatar' => $faker->name,
				'about' => $faker->paragraph(3)
			]);
		}
	}

}