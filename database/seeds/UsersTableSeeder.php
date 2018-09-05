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
        $user_data = array(
            array('first_name' => 'Brady',
                'last_name' => 'Hammond',
                'email' => 'bradymh23@gmail.com',
                'password' => '$2y$10$xMgF742xNshHtA7V7ZX/MeyxUbbJHeOKvDiEt6.iPMGjwM/jLOilu',
                'superuser' => true,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()),
            array('first_name' => 'Michael',
                'last_name' => 'Pease',
                'email' => 'grapplergym@gmail.com',
                'password' => '$2y$10$OHiccGLQAsoY15yvARrtzOFSytQE2xI598rSAfex2OEkVuUUGuSBO',
                'superuser' => true,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString())
        );

        User::insert($user_data);
    }
}
