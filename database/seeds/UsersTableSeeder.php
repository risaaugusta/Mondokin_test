<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin's account
        User::create([
            'email' => 'admin@mondok.id',
            'username' => 'admin',
            'password' => 'secret123',
            'role' => 'super_admin'
        ]);
    }
}
