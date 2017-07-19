<?php

use App\Lession;
use App\Tag;
use Illuminate\Database\Seeder;

class LessionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('lession_tag')->truncate();

        $lessionIds = Lession::lists('id')->toArray();
        $tagIds = Tag::lists('id')->toArray();

        foreach (range(1, 30) as $index) {
            DB::table('lession_tag')->insert([
                'lession_id' => $faker->randomElement($lessionIds),
                'tag_id'     => $faker->randomElement($tagIds),
            ]);
        }
    }
}
