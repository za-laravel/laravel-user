<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->delete();

        $model = Config::get('auth.model');
        foreach(range(1, 30) as $index)
        {
            $user = $model::create([
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'user_name' => $faker->userName,
                'blocked' => rand(0,1),
            ]);
        }
    }
}