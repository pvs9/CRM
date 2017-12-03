<?php

use Illuminate\Database\Seeder;

class BuildTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('statistics')->insert(['user_id' => null, 'month' => 'January', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'February', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'March', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'April', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'May', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'June', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'July', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'August', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'September', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'October', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'November', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'December', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0]);

		DB::table('users')->insert(['last_name' => 'Администратор', 'first_name' => 'Администратор', 'email' => 'admin@admin.ru', 'password' => bcrypt('TheCRMAdministrator'), 'position' => 'Руководитель', 'is_admin' => 1]);
    }


}
