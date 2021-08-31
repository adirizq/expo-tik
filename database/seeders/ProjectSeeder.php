<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project::truncate();
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            Project::insert([
                'id_category'=> $faker->numberBetween(1, 4),
                'title'=> $faker->words(5, true),
                'thumbnail'=> $faker->imageUrl,
                'desc'=> $faker->text,
                'url_youtube'=> 'https://www.youtube.com/watch?v=AHa5mJFlqOg&ab_channel=JTIKPNJ',
                'url_website'=> null,
                'year'=> date('Y'),
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s'),
            ]);
        }
    }
}
