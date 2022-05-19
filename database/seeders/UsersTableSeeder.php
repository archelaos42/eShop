<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Adminsky',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => '1',
        ]);
        User::factory(10)->create();
    }
}
