<?php

use Illuminate\Database\Seeder;
use App\About;
use Carbon\Carbon;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('content' => '<p>This page is currently under construction.</p>',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString())
        );

        About::insert($data);
    }
}
