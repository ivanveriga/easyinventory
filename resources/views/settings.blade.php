@extends('layouts.app')

@section ('content')
<!-- Title -->
<div class="w-25 ml-5 mt-5 com-title"><p>Настройки</p></div>

<!-- Section: Texture Settings -->
<div class="ml-5 mt-5 com-subtitle"><p>Загрузить текстуры для объектов</p></div>
<table class="w-75 ml-5 mt-3 com-section">
    <thead>
        <tr class="d-flex mt-4 mb-4"> <th class="col-4 text-center">Объект</th> <th class="col-6"></th> <th class="col-2"></th> </tr>
    </thead>
    <tbody class="m-5">
        <!-- Computer -->
        <tr class="d-flex mt-3 mb-5">
            <form method="post" enctype='multipart/form-data' action="{{ route('settings.texture.load') }}">
                <input type="hidden" name="object_type" value="type_computer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td class="col-4 mt-3 text-center">Компьютер</td>
                <td class="col-6 mt-3"><input type="file" name="computer_texture"></td>
                <td class="col-2 d-flex justify-content-center">
                    <input type="submit" class="bg-white com-table-button-add" value="↻">
                </td>
            </form>
        </tr>
        <!-- Thin client -->
        <tr class="d-flex mt-3 mb-5">
            <form method="post" enctype='multipart/form-data' action="{{ route('settings.texture.load') }}">
                <input type="hidden" name="object_type" value="type_thinclient">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td class="col-4 mt-3 text-center">Тонкий клиент</td>
                <td class="col-6 mt-3"><input type="file" name="thinclient_texture"></td>
                <td class="col-2 d-flex justify-content-center">
                    <input type="submit" class="bg-white com-table-button-add" value="↻">
                </td>
            </form>
        </tr>
    </tbody>
</table>

@endsection