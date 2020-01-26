@extends('layouts.app')

@section ('content')
<!-- Title -->
<div class="w-25 ml-5 mt-5 com-title"><p>Дашборд</p></div><br>

<!-- Timer -->
<div class="ml-5 mb-5">
    <div class="d-block col-4 p-5 mt-5 com-section">
        <div class="d-flex justify-content-center com-widjet-datetime">
            <div id="timer_hour">00</div>
            <div class="ml-3 mr-3">:</div>
            <div id="timer_minute">00</div>
            <div class="ml-3 mr-3">:</div>
            <div id="timer_second">00</div>
        </div>
        <div class="d-flex justify-content-center com-widjet-datetime" style="font-size: 28px;">
            {{ Carbon\Carbon::now()->toFormattedDateString() }}
        </div>
    </div>
</div>

<div class="col-3 ml-4 mt-5">
    <div class="pt-3 pb-3 com-section">
        <div class="com-subtitle text-center">Всего подразделений</div>
        <div class="com-subtitle text-center com-table-button-add">{{count($structures)}}</div>
    </div>
    <br>
    <div class="pt-3 pb-3 com-section">
        <div class="com-subtitle text-center">Всего кабинетов</div>
        <div class="com-subtitle text-center com-table-button-add">{{count($rooms)}}</div>
    </div>
    <br>
</div>

<!-- Table counters -->
<div class="ml-5 mt-5">
    <table class="w-50 com-section">
        <thead>
            <tr class="d-flex mt-4 mb-4">
                <th class="col-4 text-center">Подразделение</th> 
                <th class="col-4 pl-5 text-center">Компьютеры</th> 
                <th class="col-4 pl-5 text-center">Тонкие клиенты</th> 
            </tr>
        </thead>
        <tbody class="m-5">
            <tr class="d-flex mt-5 mb-5">
                <td class="col-4 ml-5">Склад</td>
                <td class="col-4 pr-5 text-center">{{$warehouseComputersCount}}</td>
                <td class="col-4 pr-5 text-center">{{$warehouseThinClientsCount}}</td>
            </tr>
            @foreach($structures as $structure)
                <tr class="d-flex mt-5 mb-5">
                    <td class="col-4 ml-5">{{$structure->name}}</td>
                    <td class="col-4 pr-5 text-center">{{$structure->computersCount}}</td>
                    <td class="col-4 pr-5 text-center">{{$structure->thinClientsCount}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script src="{{ asset('js/timer.js') }}"></script>

@endsection