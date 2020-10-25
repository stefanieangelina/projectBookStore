<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(User::class, 1)->create()->each(function ($user) {
            $user->name='admin';
            $user->email='admin@gmail.com';
            $user->role='Admin';
            $user->save();
        });
        factory(User::class, 1)->create()->each(function ($user) {
            $user->name='dummy';
            $user->email='dummy@gmail.com';
            $user->phone='6287853265181';
            $user->address='Jl Di Rumah';
            $user->role='Customer';
            $user->save();
        });
    }
}
