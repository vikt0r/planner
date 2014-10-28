<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGaansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gaans', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('trackno')->default(0);
			$table->integer('playtime')->default(0);
			$table->integer('lyric_id')->default(0);
			$table->string('filename');
			$table->string('filepath');
			$table->string('attr')->default('');
			$table->integer('artist_id');
			$table->integer('album_id');
			$table->string('genre_id');

			$table->string('year');
			$table->string('composer')->default('');
			$table->string('publisher')->default('');

			$table->boolean('published')->default(0);
			$table->boolean('cdn')->default(0);
			$table->timestamps();
			//enable soft deletes
			$table->softDeletes();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gaans');
	}

}
