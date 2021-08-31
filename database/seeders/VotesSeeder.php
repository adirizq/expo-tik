<?php

namespace Database\Seeders;

use App\Models\Votes;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Votes::truncate();
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 300; $i++) {
            Votes::insert([
                'id_project'=> $faker->numberBetween(50, 100),
                'email'=> $faker->unique()->safeEmail,
                'name'=> $faker->firstName.' '.$faker->lastName,
                'ipaddress'=> $faker->ipv4(),
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s'),
            ]);
        }
    }
}
