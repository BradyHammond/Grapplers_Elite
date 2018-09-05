<?php

use Illuminate\Database\Seeder;
use App\Outreach;
use Carbon\Carbon;

class OutreachTableSeeder extends Seeder
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

        Outreach::insert($data);
    }
}
