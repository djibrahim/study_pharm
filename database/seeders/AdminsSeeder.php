<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'ibrahim djama',
            'email' => 'ibrahimdjama@gmail.com',
            'password' => Hash::make('123456')
        ]);

        Admin::create([
            'name' => 'issam ikhlef',
            'email' => 'issamikhlef@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
