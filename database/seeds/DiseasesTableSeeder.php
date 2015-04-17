<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;
use Illuminate\Support\Str;

class DiseasesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<30; $i++){

            $fullName = $faker->word;

            \DB::table('diseases')->insert(array(
                'name' => $fullName,
                'slug' => Str::slug($fullName),
                'specialty_ids' => $faker->numberBetween($min = 0, $max = 29),
                'description' => $faker->paragraph($nbSentences = 5)
            ));

        }
    }

}

