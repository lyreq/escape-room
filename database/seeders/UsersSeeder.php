<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@admin.com";
        $user->password = Hash::make("demoadmin");
        $user->date_of_birth = Carbon::now();
        $user->email_verified_at = Carbon::now();
        $user->save();
    }
}
