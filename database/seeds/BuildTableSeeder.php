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
		DB::table('statistics')->insert([['user_id' => null, 'month' => 'January', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'February', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'March', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'April', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'May', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'June', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'July', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'August', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'September', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'October', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'November', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0],
			['user_id' => null, 'month' => 'December', 'year' => date("Y"), 'events' => 0, 'events_closed' => 0]]);

		DB::table('users')->insert(['last_name' => 'Администратор', 'first_name' => 'Администратор', 'email' => 'admin@admin.ru', 'password' => bcrypt('TheCRMAdministrator'), 'position' => 'Руководитель', 'is_admin' => 1]);
    }


}
