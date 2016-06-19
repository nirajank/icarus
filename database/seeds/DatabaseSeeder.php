<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
       'name' => 'sandesh',
       'email' => 'sandesh@gmail.com',
         'password' => bcrypt('sandesh'),
         
         //$this->call('UserTableSeeder');
            ]);
        DB::table('theme')->insert([
       'name' => 'about',       
         //$this->call('UserTableSeeder');
            ]);
         DB::table('theme')->insert([
       'name' => 'service',       
         //$this->call('UserTableSeeder');
            ]);
          DB::table('theme')->insert([
       'name' => 'enquiry',       
         //$this->call('UserTableSeeder');
            ]);
           DB::table('theme')->insert([
       'name' => 'product',       
         //$this->call('UserTableSeeder');
            ]);
            DB::table('theme')->insert([
       'name' => 'slider',       
         //$this->call('UserTableSeeder');
            ]);
    }
}
