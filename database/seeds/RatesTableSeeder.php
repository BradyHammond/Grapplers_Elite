<?php

use Illuminate\Database\Seeder;
use App\Rate;
use Carbon\Carbon;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('age' => 'Adult',
                'content' => '<p>This page is currently under construction.</p>',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()),
            array('age' => 'Junior',
                'content' => '<p>This page is currently under construction.</p>',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()),
        );

        Rate::insert($data);
    }
}
