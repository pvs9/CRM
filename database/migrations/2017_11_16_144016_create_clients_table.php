<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function (Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->string('last_name', 25)->nullable();
			$table->string('first_name', 25)->nullable();
			$table->string('given_name', 25)->nullable();
			$table->string('company', 25)->nullable();
			$table->string('position', 25)->nullable();
			$table->string('email', 25)->nullable();
			$table->string('telephone', 25)->nullable();
			$table->string('telephone2', 25)->nullable();
			$table->text('last_comment')->nullable();
			$table->timestamps();
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
		Schema::dropIfExists('clients');
	}
}
