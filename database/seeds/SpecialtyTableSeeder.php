<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SpecialtyTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<30; $i++){

            $fullName = $faker->word;

           \DB::table('specialty')->insert(array(
                'name' => $fullName,
                'slug' => Str::slug($fullName),
                'disease_ids' => $faker->numberBetween($min = 0, $max = 29),
                'description' => $faker->paragraph($nbSentences = 5)
            ));

        }
    }

}