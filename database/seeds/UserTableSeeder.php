<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<30; $i++){
            $id = \DB::table('users')->insertGetId(array(
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => \Hash::make('123'),
                'slug' => $faker->slug,
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'blood_type' => $faker->randomElement($array = array ('o-', 'o+', 'a+', 'a-', 'b+', 'b-', 'ab-', 'ab+')),
                'donor' => $faker->randomElement($array = array (true, false)),
                'country' => $faker->country,
                'city' => $faker->city,
                'address' => $faker->streetAddress,
                'medals' => '',
                'type' => $faker->randomElement($array = array ('patient', 'doctor'))
            ));

        }

        \DB::table('users')->insert(array(
            'username' => 'nicolasvelah',
            'email' => 'nicolasvelah@gmail.com',
            'password' => \Hash::make('secreto'),
            'slug' => 'nicolasvelah',
            'name' => 'Nicolás',
            'lastname' => 'Vela',
            'phone' => '0997671615',
            'blood_type' => 'o-',
            'donor' => true,
            'country' => 'Ecuador',
            'city' => 'Quito',
            'address' => 'Cumbayá',
            'medals' => '',
            'type' => 'superAdmin'
        ));
    }
}