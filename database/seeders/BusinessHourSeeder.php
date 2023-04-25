<?php

namespace Database\Seeders;

use App\Models\BussinessHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // access to variable config days
        $days = config('appointment.days');
        foreach($days as $day){
            BussinessHour::query()->updateOrCreate(
                [
                    'day'   =>  $day,
                ],
                [
                    'from'  =>  '09:00',
                    'to'    =>  '17:00',
                    'step'  =>  30,

                ]
             );
        }
    }
}
