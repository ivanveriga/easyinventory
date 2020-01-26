<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/easyinventory.js') }}"></script>
</head>
<body>
    <div class="container-fluid d-flex m-0 p-0">
        <!-- Leftside area-->
        <div class="col-2 m-0 p-0 com-menu">
            <!-- Logo -->
            <div class="text-center">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('img/logo.svg') }}" alt="icon.svg" height=128px class="mt-5 mb-5"></a>
            </div>
            <!-- Menu -->
            <div class="container d-block m-0 p-0">
                <?php echo $_SERVER['REQUEST_URI'] == '/public/dashboard' ? "<div class='com-button-active'>" : "<div class='com-button-inactive'>" ?> <div></div><a href="{{ route('dashboard') }}">Дашборд</a></div>
                <?php echo $_SERVER['REQUEST_URI'] == '/public/warehouse' ? "<div class='com-button-active'>" : "<div class='com-button-inactive'>" ?> <div></div><a href="{{ route('warehouse') }}">Склад</a></div>
                <?php echo $_SERVER['REQUEST_URI'] == '/public/settings' ? "<div class='com-button-active'>" : "<div class='com-button-inactive'>" ?> <div></div><a href="{{ route('settings') }}">Настройки</a></div>
                <?php echo $_SERVER['REQUEST_URI'] == '/public/structure' ? "<div class='com-button-active'>" : "<div class='com-button-inactive'>" ?> <div></div><a href="{{ route('structure') }}">Подразделения</a></div>
                <?php echo $_SERVER['REQUEST_URI'] == '/public/room' ? "<div class='com-button-active'>" : "<div class='com-button-inactive'>" ?> <div></div><a href="{{ route('room.control') }}">Помещения</a></div>
                <div class="com-button-inactive"><div></div><a href="{{ route('logout') }}">Выйти</a></div>

                <br><br><br><br><br>

                @foreach ($structuresActive as $structure)
                    <div onclick="swapStatusSubmenu('submenu_{{$structure->id}}')" class="com-button-inactive"><a>{{ $structure->name }}</a></div>
                    <ul class="p-0" id="submenu_{{$structure->id}}" style="display:none">
                        @foreach ($roomsActive as $room)
                            @if ($room->structure_id == $structure->id)
                                <li><div class="com-button-inactive"><div class="w-25"></div><a style="font-size: 16px" href="{{ route('room', $room->id) }}">{{ $room->room_name }}</a></div></li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <br><br><br><br><br>
            <!-- Footer -->
            <div class="position-absolute fixed-bottom ml-3 h5 text-light">
                <p>@OpenSource</p>
                <a href="https://github.com/ivanveriga/easyinventory" target="_blank">GitHub</a>
            </div>
        </div>
        <!-- Rightside area -->
        <div class="col-10 bg-light p-0 m-0">
            @yield ('content')
        </div>
    </div>
</body>
</html>
