<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;
use Illuminate\Support\Facades\DB;


class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'starttime' => '09:00:00',
                'endtime' => '10:00:00'
            ],
            [
                'starttime' => '10:00:00',
                'endtime' => '11:00:00'
            ],
            [
                'starttime' => '11:00:00',
                'endtime' => '12:00:00'
            ],
            [
                'starttime' => '14:30:00',
                'endtime' => '15:30:00'
            ],
            [
                'starttime' => '15:30:00',
                'endtime' => '16:30:00'
            ],
        ]);
    }
}
