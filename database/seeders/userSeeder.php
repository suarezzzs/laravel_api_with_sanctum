<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add user
        $user = new User();
        $user->name = 'AppConsumer001';
        $user->email = 'AppConsumer001@api.com';
        $user->password = bcrypt("12345678");
        $user->save();
    }
}
