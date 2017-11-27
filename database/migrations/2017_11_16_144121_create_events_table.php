<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('client_id');
			$table->enum('type', ['Предложение', 'Письмо', 'Звонок', 'Встреча', 'Договор']);
			$table->dateTime('date');
			$table->string('address')->nullable();
			$table->text('comment')->nullable();
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
		Schema::dropIfExists('events');
	}
}
