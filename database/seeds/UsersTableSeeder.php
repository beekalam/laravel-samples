<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::truncate();
       factory(App\User::class,100)->create();
    }
}
