<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         DB::table('users')->insert([

            // admin 
           [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'status' => 'active',
           ],


            [
            'name' => 'Vendor',
            'username' => 'vendor',
            'email' => 'vander@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'vendor',
            'status' => 'active',
           ],



            [
            'name' => 'Customer',
            'username' => 'user',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'status' => 'active',
           ],



        ]);
    }
}
