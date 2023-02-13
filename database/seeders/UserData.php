<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'masbro',
                'email'  => 'capybaraadmin@gmail.com',
                'password' => bcrypt('12345'),
                'level' =>1,
            ],
            [
                'name' => 'capybara',
                'email'  => 'capybara@gmail.com',
                'password' => bcrypt('12345'),
                'level' =>2,
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }

    }
}
