<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'first_name' => 'Brady',
            'last_name' => 'Hammond',
            'email' => 'bradymh23@gmail.com',
            'password' => '$2y$10$xMgF742xNshHtA7V7ZX/MeyxUbbJHeOKvDiEt6.iPMGjwM/jLOilu',
            'superuser' => true,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
