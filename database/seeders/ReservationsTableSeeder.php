<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_date = Carbon::create(2023, 6, 15);
        $end_date = Carbon::create(2025, 12, 31);
        $current_date = $start_date->copy();

        while ($current_date->lessThanOrEqualTo($end_date)) {
            // 月曜日、水曜日、金曜日の場合
            if ($current_date->isMonday() || $current_date->isWednesday() || $current_date->isFriday()) {
                $this->createReservationTimes($current_date, ['10:00', '12:00', '14:30']);
            }
            // 火曜日、木曜日の場合
            elseif ($current_date->isTuesday() || $current_date->isThursday()) {
                $this->createReservationTimes($current_date, ['10:30', '12:30']);
            }
            // 土曜日の場合
            elseif ($current_date->isSaturday()) {
                // 第2、第4土曜日のみ営業
                $week_of_month = ceil($current_date->day / 7);
                if ($week_of_month == 2 || $week_of_month == 4) {
                    $this->createReservationTimes($current_date, ['10:30', '13:00']);
                }
            }

            // 次の日に進める
            $current_date->addDay();
        }
    }

    private function createReservationTimes($date, $times)
    {
        foreach ($times as $time) {
            $start_date_time = $date->copy()->setTimeFromTimeString($time);

            Reservation::insert([
                'start_time' => $start_date_time,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
