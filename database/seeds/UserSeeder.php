<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        $user = [
            1   =>  [
                'name'  =>  'hossein',
                'email' =>  'Hossein1@gmail.com',
                'password'  =>  \Illuminate\Support\Facades\Hash::make('123456789'),
                'img'   =>  'user1.png',
                'created_at'    =>  verta()->timestamp,
                'updated_at'    =>  verta()->timestamp,
            ],
            2   =>  [
                'name'  =>  'hossein',
                'email' =>  'Hossein2@gmail.com',
                'password'  =>  \Illuminate\Support\Facades\Hash::make('123456789'),
                'img'   =>  'user2.png',
                'created_at'    =>  verta()->timestamp,
                'updated_at'    =>  verta()->timestamp,
            ],
            3   =>  [
                'name'  =>  'hossein',
                'email' =>  'Hossein3@gmail.com',
                'password'  =>  \Illuminate\Support\Facades\Hash::make('123456789'),
                'img'   =>  'user3.png',
                'created_at'    =>  verta()->timestamp,
                'updated_at'    =>  verta()->timestamp,
            ]
        ];
        \App\User::insert($user);
    }
}
