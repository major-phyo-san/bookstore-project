<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            'username' => 'phoo',
            'password' => 'password'
        ]);
        Admin::create([
            'username' => 'koon',
            'password' => 'password'
        ]);
        Admin::create([
            'username' => 'koy',
            'password' => 'password'
        ]);
        Admin::create([
            'username' => 'pks',
            'password' => 'password'
        ]);
    }
}
