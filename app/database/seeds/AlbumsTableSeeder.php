<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AlbumsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Album::create([
				'name' => $faker->name,
				'year' => $faker->randomDigitNotNull,
				'description' => $faker->paragraph,
				'publisher' => $faker->name
			]);
		}
	}

}