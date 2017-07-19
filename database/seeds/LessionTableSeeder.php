<?php

use App\Lession;
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
        Lession::truncate();
        factory(App\Lession::class, 30)->create();
    }
}
