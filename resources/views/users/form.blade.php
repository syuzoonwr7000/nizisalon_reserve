<style>
    body {
        background-image: url('background-image.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .form-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .form-container h2 {
        margin-top: 0;
        text-align: center;
    }

    .form-container label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .form-container button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .form-container button:hover {
        background-color: #45a049;
    }

    .reservations-table {
        width: 100%;
        border-collapse: collapse;
    }

    .reservations-table th,
    .reservations-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        border: 1px solid #ccc;
        background: #ffffff;
    }

    .reservations-table th {
        background-color: #f2f2f2;
    }

    .reservations-navigation {
        margin-top: 20px;
        text-align: center;
    }

    @media screen and (max-width: 600px) {
        .reservations-table th,
        .reservations-table td {
            font-size: 12px;
        }
    }
</style>

<div class="form-container">
    <h2>虹サロン 予約</h2>
    <form action="/submit-form" method="POST">
        @csrf
        <label for="treatment_type">施術タイプ</label>
        <select id="treatment_type" name="treatment_type">
            @foreach($treatment_types as $treatment_type)
                <option value="{{ $treatment_type->id }}">{{ $treatment_type->type . ' ' . '(' . $treatment_type->frequency . '回)' . ' ' . $treatment_type->price . '円'}}</option>
            @endforeach
        </select>
        <label for="reservation_datetime">予約日時:</label>
        <div class="table-wrapper">
            <table class="reservations-table">
                <thead>
                    <tr>
                        <th></th>
                        @for($i = 0; $i < 7; $i++)
                            <th id="date-{{ $i + 1 }}">{{ $current_date->format('n/d') }}({{ $weekdays[$current_date->dayOfWeek] }})</th>
                            @php
                                $current_date->addDay();
                            @endphp
                        @endfor
                    </tr>
                </thead>
                <tbody>
                @foreach($time_slots as $time)
                    <tr>
                        <th>{{ $time }}</th>
                        @php
                            $current_date->subDays(7);
                        @endphp
                        @for($i = 0; $i < 7; $i++)
                            <td>
                                @php
                                    $target_date_time = $current_date->copy()->setTimeFromTimeString($time);
                                    $matching_reservation = $reservable_reservations->first(function ($reservation) use ($target_date_time) {
                                        return $reservation->start_time->eq($target_date_time);
                                    });
                                @endphp
                                @if($matching_reservation)
                                    @if($matching_reservation->reservable)
                                        {{$matching_reservation->id}}
                                    @else
                                        ×
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            @php
                                $current_date->addDay();
                            @endphp
                        @endfor
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="reservations-navigation">
            <button type="button" onclick="previousWeek()">前の一週間</button>
            <button type="button" onclick="nextWeek()">次の一週間</button>
        </div>
        <button type="submit">送信</button>
    </form>
</div>

<script></script>
