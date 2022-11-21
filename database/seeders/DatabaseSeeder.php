<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Caller;
use App\Models\User;
use App\Models\Role;
//use Couchbase\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'name'=> 'Администратор',
        ]);
        Role::insert([
            'name'=> 'Преподаватель',
        ]);
        Role::insert([
            'name'=> 'Студент',
        ]);

        User::insert([
            'name'=>'admin',
            'login'=>'admin',
            'password'=> Hash::make('admin'),
            'role_id' => 1
        ]);

        Caller::insert([
            'number_lesson' => 1,
            'status' => 1,
            'time' => '8:30 - 10:00'
        ]);
        Caller::insert([
            'number_lesson' => 2,
            'status' => 1,
            'time' => '10:10 - 11:40'
        ]);
        Caller::insert([
            'number_lesson' => 'Обед',
            'status' => 1,
            'time' => '11:40 - 12:25'
        ]);
        Caller::insert([
            'number_lesson' => 3,
            'status' => 1,
            'time' => '12:25 - 13:55'
        ]);
        Caller::insert([
            'number_lesson' => 4,
            'status' => 1,
            'time' => '14:05 - 15:35'
        ]);
        Caller::insert([
            'number_lesson' => 5,
            'status' => 1,
            'time' => '15:45 - 17:15'
        ]);
        Caller::insert([
            'number_lesson' => 6,
            'status' => 1,
            'time' => '17:25 - 18:55'
        ]);
        Caller::insert([
            'number_lesson' => 7,
            'status' => 1,
            'time' => '19:05 - 20:35'
        ]);

        Caller::insert([
            'number_lesson' => 'Классный час',
            'status' => 2,
            'time' => '8:30 – 9:00'
        ]);
        Caller::insert([
            'number_lesson' => 1,
            'status' => 2,
            'time' => '9:10 – 10:30'
        ]);
        Caller::insert([
            'number_lesson' => 2,
            'status' => 2,
            'time' => '10:40 – 12:00'
        ]);
        Caller::insert([
            'number_lesson' => 'Обед',
            'status' => 2,
            'time' => '12:00 – 12:45'
        ]);
        Caller::insert([
            'number_lesson' => 3,
            'status' => 2,
            'time' => '12:45 – 14:05'
        ]);
        Caller::insert([
            'number_lesson' => 4,
            'status' => 2,
            'time' => '14:15 – 15:35'
        ]);
        Caller::insert([
            'number_lesson' => 5,
            'status' => 2,
            'time' => '15:45 – 17:05'
        ]);
        Caller::insert([
            'number_lesson' => 6,
            'status' => 2,
            'time' => '17:15 – 18:35'
        ]);
        Caller::insert([
            'number_lesson' => 7,
            'status' => 2,
            'time' => '18:45 - 20:05'
        ]);

        Caller::insert([
            'number_lesson' => 1,
            'status' => 3,
            'time' => '8:30 – 9:30'
        ]);
        Caller::insert([
            'number_lesson' => 2,
            'status' => 3,
            'time' => '9:40 – 10:40'
        ]);
        Caller::insert([
            'number_lesson' => 3,
            'status' => 3,
            'time' => '10:50 – 11:50'
        ]);
        Caller::insert([
            'number_lesson' => 4,
            'status' => 3,
            'time' => '12:00 – 13:00'
        ]);
        Caller::insert([
            'number_lesson' => 5,
            'status' => 3,
            'time' => '13:10 – 14:10'
        ]);
        Caller::insert([
            'number_lesson' => 6,
            'status' => 3,
            'time' => '14:20 – 15:20'
        ]);
        Caller::insert([
            'number_lesson' => 7,
            'status' => 3,
            'time' => '15:30 - 16:30'
        ]);
    }
}
