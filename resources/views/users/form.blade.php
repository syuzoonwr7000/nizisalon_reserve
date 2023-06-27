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
                        <th id="date-1"></th>
                        <th id="date-2"></th>
                        <th id="date-3"></th>
                        <th id="date-4"></th>
                        <th id="date-5"></th>
                        <th id="date-6"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>10:00</th>
                        @foreach($weekdays as $index => $weekday)
                        <td>
                            @php
                                $reservation_found = false;
                                $target_date = date('Y-m-d', strtotime('+' . $index . ' days', strtotime($current_date)));
                                $target_time = '10:00';
                                $matching_reservations = $reservable_reservations->filter(function ($reservation) use ($target_date, $target_time) {
                                    return $reservation->start_time->format('H:i') === $target_time && $reservation->start_time->format('Y-m-d') === $target_date;
                                });
                            @endphp

                            @foreach($matching_reservations as $reservation)
                                @php
                                    $reservation_found = true;
                                @endphp

                                @if($reservation->reservable === 1)
                                    {{ $reservation->id .'〇' }}
                                @else
                                    {{ $reservation->id .'×' }}
                                @endif
                            @endforeach

                            @if(!$reservation_found)
                                -
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>10:30</th>
                        @foreach($weekdays as $index => $weekday)
                        <td>
                            @php
                                $reservation_found = false;
                                $target_date = date('Y-m-d', strtotime('+' . $index . ' days', strtotime($current_date)));
                                $target_time = '10:30';
                                $matching_reservations = $reservable_reservations->filter(function ($reservation) use ($target_date, $target_time) {
                                    return $reservation->start_time->format('H:i') === $target_time && $reservation->start_time->format('Y-m-d') === $target_date;
                                });
                            @endphp

                            @foreach($matching_reservations as $reservation)
                                @php
                                    $reservation_found = true;
                                @endphp

                                @if($reservation->reservable === 1)
                                    {{ $reservation->id .'〇' }}
                                @else
                                    {{ $reservation->id .'×' }}
                                @endif
                            @endforeach

                            @if(!$reservation_found)
                                -
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>12:00</th>
                        @foreach($weekdays as $index => $weekday)
                        <td>
                            @php
                                $reservation_found = false;
                                $target_date = date('Y-m-d', strtotime('+' . $index . ' days', strtotime($current_date)));
                                $target_time = '12:00';
                                $matching_reservations = $reservable_reservations->filter(function ($reservation) use ($target_date, $target_time) {
                                    return $reservation->start_time->format('H:i') === $target_time && $reservation->start_time->format('Y-m-d') === $target_date;
                                });
                            @endphp

                            @foreach($matching_reservations as $reservation)
                                @php
                                    $reservation_found = true;
                                @endphp

                                @if($reservation->reservable === 1)
                                    {{ $reservation->id .'〇' }}
                                @else
                                    {{ $reservation->id .'×' }}
                                @endif
                            @endforeach

                            @if(!$reservation_found)
                                -
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>12:30</th>
                        @foreach($weekdays as $index => $weekday)
                        <td>
                            @php
                                $reservation_found = false;
                                $target_date = date('Y-m-d', strtotime('+' . $index . ' days', strtotime($current_date)));
                                $target_time = '12:30';
                                $matching_reservations = $reservable_reservations->filter(function ($reservation) use ($target_date, $target_time) {
                                    return $reservation->start_time->format('H:i') === $target_time && $reservation->start_time->format('Y-m-d') === $target_date;
                                });
                            @endphp

                            @foreach($matching_reservations as $reservation)
                                @php
                                    $reservation_found = true;
                                @endphp

                                @if($reservation->reservable === 1)
                                    {{ $reservation->id .'〇' }}
                                @else
                                    {{ $reservation->id .'×' }}
                                @endif
                            @endforeach

                            @if(!$reservation_found)
                                -
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>13:00</th>
                        @foreach($weekdays as $index => $weekday)
                        <td>
                            @php
                                $reservation_found = false;
                                $target_date = date('Y-m-d', strtotime('+' . $index . ' days', strtotime($current_date)));
                                $target_time = '13:00';
                                $matching_reservations = $reservable_reservations->filter(function ($reservation) use ($target_date, $target_time) {
                                    return $reservation->start_time->format('H:i') === $target_time && $reservation->start_time->format('Y-m-d') === $target_date;
                                });
                            @endphp

                            @foreach($matching_reservations as $reservation)
                                @php
                                    $reservation_found = true;
                                @endphp

                                @if($reservation->reservable === 1)
                                    {{ $reservation->id .'〇' }}
                                @else
                                    {{ $reservation->id .'×' }}
                                @endif
                            @endforeach

                            @if(!$reservation_found)
                                -
                            @endif
                        </td>
                        @endforeach
                    </tr>
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

<script>
    const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
    const currentDate = new Date();
    updateDates();

    // 前の一週間を表示する関数
    function previousWeek() {
        currentDate.setDate(currentDate.getDate() - 7);
        updateDates();
    }

    // 次の一週間を表示する関数
    function nextWeek() {
        currentDate.setDate(currentDate.getDate() + 7);
        updateDates();
    }

    // 日付を更新する関数
    function updateDates() {
        const table = document.querySelector('.reservations-table');
        const headerRow = table.querySelector('thead tr');

        // 曜日の日付を更新する
        for (let i = 1; i < headerRow.cells.length; i++) {
            const cell = headerRow.cells[i];
            const date = new Date(currentDate.getTime() + (i - 1) * 24 * 60 * 60 * 1000);
            
            // 日曜日の場合は次の月曜日の日付を取得
            if (date.getDay() === 0) {
                date.setDate(date.getDate() + 1);
            }

            const dayOfWeek = weekdays[date.getDay()];
            const dateString = date.toLocaleDateString('ja-JP', { month: '2-digit', day: '2-digit' });
            cell.textContent = `${dateString}(${dayOfWeek})`;
            cell.id = `date-${i - 1}`;
        }
    }
</script>