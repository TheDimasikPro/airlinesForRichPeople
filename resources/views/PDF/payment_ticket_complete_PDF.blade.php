<style>
    body { font-family: DejaVu Sans, sans-serif; }
    table.iksweb{
        width: 100%;
        border-collapse:collapse;
        border-spacing:0;
        height: auto;
        margin-top: 30px;
    }
    table.iksweb,table.iksweb td, table.iksweb th {
        border: 1px solid #595959;
    }
    table.iksweb td,table.iksweb th {
        padding: 3px;
        width: 30px;
        height: 35px;
    }
    table.iksweb th {
        background: #347c99; 
        color: #fff; 
        font-weight: normal;
    }
    table.iksweb tr td .title_name{
        text-align:center
    }
    table.iksweb tr td{
        font-size: 14px;
    }
    table.iksweb tr td{
        text-align: center
    }
    h1{
        margin: 0;
    }
    p{
        color: #FF0800;
    }
</style>
<h1>Оплата билетов прошла успешно</h1>
<h3>В таблице указаны рейсы, которые вы оплатили. Номер билета вы получите после регистрации на рейс онлайн или в аэропорту.</h3>
<p>Время указано местное</p>
<p>Цена в таблице указана за 1 билет</p>
@php( Date::setLocale('ru'))
<table class="iksweb">
	<tbody>
		<tr>
			<td class="иап title_name">№</td>
			<td class="title_name">Номер рейса</td>
			<td class="title_name" colspan="2">План полета</td>
			<td class="title_name">Время и дата вылета</td>
			<td class="title_name">Время и дата прилета</td>
			<td class="title_name">Цена</td>
		</tr>
        <?php $key_number = 0;?>
        @foreach ($response_mail as $key => $response_mail__item__second)
            <?php $key_number++;?>
            @if (!empty($response_mail__item__second["flight_from"]))
                <tr>
                    <td>{{ $key_number }}</td>
                    <td>{{ $response_mail__item__second["flight_from"]["flight_code"] }}</td>
                    @if (empty($response_mail__item__second["flight_from"]['airport_flight_from_start']["city_rus"]))
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_start']["city_eng"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_start']["iata_code"]) }})
                        </td>
                    @else
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_start']["city_rus"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_start']["iata_code"]) }})
                        </td>
                    @endif
                    {{-- <td>
                        {{ Екатеринбург }} (SVX)
                    </td> --}}
                    @if (empty($response_mail__item__second["flight_from"]['airport_flight_from_end']["city_rus"]))
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_end']["city_eng"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_end']["iata_code"]) }})
                        </td>
                    @else
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_end']["city_rus"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_from"]['airport_flight_from_end']["iata_code"]) }})
                        </td>
                    @endif
                    {{-- <td>Москва (DME)</td> --}}
                    {{-- <div class="time_flight">{{ \Jenssegers\Date\Date::parse($auth_user__flight_arr['flight_from']["time_start"])->format('H:i') }}</div> --}}
                    <td>
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_from']["time_start"])->format('H:i') }} 
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_from']["date_start"])->format('Y/m/d') }}
                    </td>
                    <td>
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_from']["time_end"])->format('H:i') }} 
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_from']["date_end"])->format('Y/m/d') }}
                    </td>
                    <td>{{ htmlspecialchars($response_mail__item__second['flight_from']["cost"]) }}р</td>
                </tr>
            @endif
            
            @if (!empty($response_mail__item__second["flight_back"]))
                <tr>
                    <td>{{ $key_number }}</td>
                    <td>{{ $response_mail__item__second["flight_back"]["flight_code"] }}</td>
                    @if (empty($response_mail__item__second["flight_back"]['airport_flight_back_start']["city_rus"]))
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_start']["city_eng"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_start']["iata_code"]) }})
                        </td>
                    @else
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_start']["city_rus"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_start']["iata_code"]) }})
                        </td>
                    @endif
                    {{-- <td>
                        {{ Екатеринбург }} (SVX)
                    </td> --}}
                    @if (empty($response_mail__item__second["flight_back"]['airport_flight_back_end']["city_rus"]))
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_end']["city_eng"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_end']["iata_code"]) }})
                        </td>
                    @else
                        <td>
                            {{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_end']["city_rus"]) }} 
                            ({{ htmlspecialchars($response_mail__item__second["flight_back"]['airport_flight_back_end']["iata_code"]) }})
                        </td>
                    @endif
                    {{-- <td>Москва (DME)</td> --}}
                    {{-- <div class="time_flight">{{ \Jenssegers\Date\Date::parse($auth_user__flight_arr['flight_from']["time_start"])->format('H:i') }}</div> --}}
                    <td>
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_back']["time_start"])->format('H:i') }} 
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_back']["date_start"])->format('Y/m/d') }}
                    </td>
                    <td>
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_back']["time_end"])->format('H:i') }} 
                        {{ \Jenssegers\Date\Date::parse($response_mail__item__second['flight_back']["date_end"])->format('Y/m/d') }}
                    </td>
                    <td>{{ htmlspecialchars( $response_mail__item__second['flight_back']["cost"]) }}р</td>
                </tr>
            @endif
        @endforeach
		<tr>
            <td colspan="4">Общее кол-во пассажиров на всех рейсах: {{ $response_mail["count_pass"] }}</td>
            {{-- @if ($response_mail["count_pass"] > 1)
                <td colspan="3">Итоговая стоимость всех билетов: {{ $response_mail["count_pass"] * ($response_mail["all_cost"]/2) }}р</td>
            @else
            <td colspan="3">Итоговая стоимость всех билетов: {{ $response_mail["count_pass"] * $response_mail["all_cost"] }}р</td>
            @endif --}}
            <td colspan="3">Итоговая стоимость всех билетов: {{ $response_mail["all_cost"] }}р</td>
        </tr>
	</tbody>
</table>