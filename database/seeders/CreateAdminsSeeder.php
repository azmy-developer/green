<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class  CreateAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admins = [
            [
               'name'=>'Manager User',
               'email'=>'admin@admin.com',
               'password'=> bcrypt('123456'),
            ],

        ];

        foreach ($admins as $key => $admin) {
            Admin::create($admin);
        }
    }
}
