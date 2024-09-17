<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(30)->create();

        $user = User::find(1);
        $user->name = 'Rainsen';
        $user->email = 'imrainsen@gmail.com';
        $user->password = bcrypt('000000');
        $user->is_admin = true;
        $user->save();
    }
}
