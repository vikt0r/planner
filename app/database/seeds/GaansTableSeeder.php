<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GaansTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Gaan::create([
				'title' => $faker->sentence(3),
				'trackno' => $faker->randomDigitNotNull,
				'playtime' => $faker->randomNumber,
				'lyric_id' => $faker->randomNumber(1,10),
				'filename' => $faker->name,
				'filepath' => $faker->name,
				'attr' => $faker->name,
				'artist_id' => $faker->randomNumber(1,5),
				'album_id' => $faker->randomNumber(1,5),
				'genre_id' => $faker->randomNumber(1,5),
				'year' => $faker->year,
				'composer' => $faker->name,
				'publisher' => $faker->name,
				'published' => $faker->boolean,
				'cdn' => $faker->boolean
			]);
		}
	}

}