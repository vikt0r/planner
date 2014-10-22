<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		File::deleteDirectory(storage_path().'/media/');

		Gaan::truncate();
		Album::truncate();
		Artist::truncate();
		User::truncate();
		Role::truncate();

		$this->call('GaansTableSeeder');
		$this->call('ArtistsTableSeeder');
		$this->call('AlbumsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
	}

}