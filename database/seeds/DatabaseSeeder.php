<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(demotableSeeder::class);

        DB::table('users')->insert([
            'name' => 'super',
            'username' => 'super',
            'email' => 'super@gmail.com',
            'password' => bcrypt('1'),
            'password_decode' => bcrypt('1'),
        ]);
    }
}
