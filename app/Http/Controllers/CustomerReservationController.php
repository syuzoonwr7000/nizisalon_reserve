<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\TreatmentType;
use Carbon\Carbon;

class CustomerReservationController extends Controller
{
    public function reserve()
    {
        $reservable_reservations = Reservation::all();

        // start_timeとend_timeをDateTime型に変換してからビューに渡す
        $reservable_reservations->transform(function ($reservation) {
            $reservation->start_time = Carbon::parse($reservation->start_time);return $reservation;
        });

        // カレンダー表示用
        $weekdays = ['日','月', '火', '水', '木', '金', '土'];
        $current_date = Carbon::tomorrow();
        // $current_date = '2023-06-30';
        $time_slots = ['10:00', '10:30', '12:00', '12:30', '13:00','14:30'];


        $treatment_types = TreatmentType::all();

        return view('users.form',compact(
            'reservable_reservations',
            'weekdays',
            'current_date',
            'treatment_types',
            'time_slots',
        ));
    }
}
