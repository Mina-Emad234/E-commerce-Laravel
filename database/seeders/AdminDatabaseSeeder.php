<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'name'=>"Mina Emad",
           "email"=> "mina899432@gmail.com",
            "password"=>bcrypt("123456789")
        ]);
    }
}
