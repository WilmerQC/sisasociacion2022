<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Wilmer Quispe Copaja',
            'email'=>'wilmer.quispe@upeu.edu.pe',
            'password'=>bcrypt('12345678')
        ]);
        User::factory(10)->create();
    }
}
