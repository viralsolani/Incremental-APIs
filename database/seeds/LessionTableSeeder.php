<?php

use Illuminate\Database\Seeder;

class LessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Lession::truncate();
        factory(App\Lession::class, 50)->create();
    }
}
