<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName'     => 'System',
            'lastName'      => 'Administrator',
            'job_title'     => 'God',
            'profile_image' => '',
            'email'         => 'admin@universe.rocketstart.ch',
            'password'      => 'secret',
        ]);
    }
}
