<?php

namespace Database\Seeders;

use App\Models\Shift;
use App\Models\Worker;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->days() as $day) {
            foreach (Shift::SHIFT_TIMES as $shiftTime) {
                Shift::factory()->create([
                    'worker_id' => Worker::factory()->create()->id,
                    'shift_date' => $day,
                    'shift_time' => $shiftTime
                ]);
            }
        }
    }

    private function days()
    {
        return [
            Carbon::today(),
            Carbon::tomorrow(),
            Carbon::tomorrow()->addDay()
        ];
    }
}
