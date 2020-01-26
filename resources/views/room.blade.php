@extends('layouts.app')

@section ('content')

<!-- Title -->
<div class="w-50 ml-5 mt-5 com-title"><p>{{$structure_name}}</p></div>
<div class="ml-5 mt-3 com-subtitle">{{$room_name}}</div>

<!-- Section: Computers List -->
@if(count($computers) != 0)
    <div class="ml-5 mt-5 com-subtitle"><p>Компьютеры</p></div>
    <table class="w-75 ml-5 mt-3 com-section">
        <thead>
            <tr class="d-flex mt-4 mb-4">
                <th class="col-3 text-center">Изображение</th>
                <th class="col-4">Имя</th>
                <th class="col-4">Инв. номер</th> 
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody class="m-5">
                @foreach ($computers as $computer)
                    <tr class="d-flex mt-3 mb-3">
                        <td class="col-3 text-center"><img src="../img/textures/computer/{{$computer->texture}}" width="128px" height="96px"></td>
                        <td class="col-4 mt-5">{{$computer->name}}</td>
                        <td class="col-4 mt-5">{{$computer->inventarization_number}}</td>
                        <td class="col-1 mt-4 d-flex com-table-button-remake" onclick="showModal('modal_computer_info_{{$computer->id}}')">⋮</td>
                    </tr>
                    <!-- Modal: Info about computer -->
                    <div id="modal_computer_info_{{$computer->id}}" class="mb-5 com-modal-window">
                        <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_computer_info_{{$computer->id}}')">⛌</div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="com-modal-section">
                                <div class="m-5">
                                    <div class="d-flex">
                                        <div class="d-block col-10">
                                            <div class="w-50 ml-5 com-title"><p>{{$structure_name}}</p></div>
                                            <div class="d-flex ml-5 mt-2 pb-3 com-subtitle"><p>{{$room_name}},</p><p class="ml-5">Компьютер</p></div>
                                        </div>
                                        <div class="d-flex col-2">
                                            <div class="mt-5 mb-5 mr-5 com-table-button-add" onclick="remakeComputer('{{$computer->id}}')">↻</div>
                                            <br>
                                            <div class="mt-5 mb-5 mr-5 ml-3 com-table-button-remake" onclick="showModal('modal_computer_move_{{$computer->id}}')">⤭</div>
                                        </div>
                                    </div>
                                    <!-- Table: Info-->
                                    <div class="mt-5 ml-5 mr-5">
                                        <input type="hidden" id="modal_computer_info_computerId_{{$computer->id}}" value="{{$computer->id}}">

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Общая информация</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Имя компьютера</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_name_{{$computer->id}}" value="{{$computer->name}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Текстура</div>
                                                <div class="col-8 td">                                
                                                    <select class="pt-2 pb-2 com-low-subtitle" id="modal_computer_info_texture_{{$computer->id}}">
                                                        @foreach ($computerTextures as $computerTexture)
                                                            @if($computerTexture == $computer->texture)
                                                                <option selected value="{{$computerTexture}}">{{$computerTexture}}</option>
                                                            @else
                                                                <option value="{{$computerTexture}}">{{$computerTexture}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Цена</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_price_{{$computer->id}}" value="{{$computer->price}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Примечания</div>
                                                <div class="col-8 td"><textarea class="w-100 border-0" id="modal_computer_info_comment_{{$computer->id}}">{{$computer->comment}}</textarea></div>
                                            </div>
                                        </div>
                                        
                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Инвентаризация</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Инвентарный номер</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_inventarization_number_{{$computer->id}}" value="{{$computer->inventarization_number}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата покупки</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_buy_{{$computer->id}}" value="{{$computer->date_buy}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата начала использования</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_commisioning_begin_{{$computer->id}}" value="{{$computer->date_commisioning_begin}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата конца использования</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_commisioning_end_{{$computer->id}}" value="{{$computer->date_commisioning_end}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата списания</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_decommissioned_{{$computer->id}}" value="{{$computer->date_decommissioned}}"></div>
                                            </div>

                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Сеть и интернет</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Наличие ЛС</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_localnetwork_{{$computer->id}}" value="{{$computer->localnetwork}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Наличие Интернета</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_internet_{{$computer->id}}" value="{{$computer->internet}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Домен</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_domen_{{$computer->id}}" value="{{$computer->domen}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Обслуживание</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата чистки</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_lastClear_{{$computer->id}}" value="{{$computer->date_lastClear}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата замены термопасты</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_lastChangeThermalGrease_{{$computer->id}}" value="{{$computer->date_lastChangeThermalGrease}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Дата проверки</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_date_lastCheck_{{$computer->id}}" value="{{$computer->date_lastCheck}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Корпус</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Модель</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_case_model_{{$computer->id}}" value="{{$computer->case_model}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Форм-фактор</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_case_form_{{$computer->id}}" value="{{$computer->case_form}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Материнская плата</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Модель</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_board_model_{{$computer->id}}" value="{{$computer->board_model}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Форм-фактор</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_board_form_{{$computer->id}}" value="{{$computer->board_form}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Сокет</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_board_socket_{{$computer->id}}" value="{{$computer->board_socket}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">BIOS</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_board_bios_{{$computer->id}}" value="{{$computer->board_bios}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Процессор</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Модель</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_model_{{$computer->id}}" value="{{$computer->cpu_model}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Сокет</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_socket_{{$computer->id}}" value="{{$computer->cpu_socket}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Кол-во ядер</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_count_cores_{{$computer->id}}" value="{{$computer->cpu_count_cores}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Кол-во потоков</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_count_threads_{{$computer->id}}" value="{{$computer->cpu_count_threads}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Частота</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_freq_{{$computer->id}}" value="{{$computer->cpu_freq}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">TDP</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_tdp_{{$computer->id}}" value="{{$computer->cpu_tdp}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Макс. температура</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_max_temperature_{{$computer->id}}" value="{{$computer->cpu_max_temperature}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Интегрированное граф. ядро</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_integrated_gpu_{{$computer->id}}" value="{{$computer->cpu_integrated_gpu}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Архитектура</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_cpu_architecture_{{$computer->id}}" value="{{$computer->cpu_architecture}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>ОЗУ</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">ОЗУ 1</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_ram_1_{{$computer->id}}" value="{{$computer->ram_1}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">ОЗУ 2</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_ram_2_{{$computer->id}}" value="{{$computer->ram_2}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">ОЗУ 3</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_ram_3_{{$computer->id}}" value="{{$computer->ram_3}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">ОЗУ 4</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_ram_4_{{$computer->id}}" value="{{$computer->ram_4}}"></div>
                                            </div>
                                        </div>

                                        <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Диски</u></p></div>
                                        <div class="com-section">
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Диск 1</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_disk_1_{{$computer->id}}" value="{{$computer->disk_1}}"></div>
                                            </div>
                                            <div class="d-flex pt-4 pb-4">
                                                <div class="col-4 td">Диск 2</div>
                                                <div class="col-8 td"><input type="text" id="modal_computer_info_disk_2_{{$computer->id}}" value="{{$computer->disk_2}}"></div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal: Transfer computer to room -->
                    <div id="modal_computer_move_{{$computer->id}}" class="com-modal-window">
                        <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_computer_move_{{$computer->id}}')">⛌</div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="com-modal-section">
                                <div class="w-25 ml-5 mt-5 com-title"><p>Склад</p></div>
                                <div class="ml-5 mt-2 pb-3 com-subtitle"><p>Перемещение компьютера</p></div>
                                <div class="d-flex ml-5 mt-5 mb-5"> 
                                    <select class="w-50 pt-3 pb-3 com-low-subtitle" id="modal_computer_transfer_new_room_id_{{$computer->id}}">
                                        <option value="0">На склад</option>
                                        @foreach ($rooms as $room)
                                            @if($room->id == $computer->room_id)
                                                <option selected value="{{$room->id}}">{{$room->structure_name}} {{$room->room_name}}</option>
                                            @else
                                                <option value="{{$room->id}}">{{$room->structure_name}} {{$room->room_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="ml-5 com-table-button-add" onclick="transferComputer('{{$computer->id}}')">↻</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </tbody>
    </table>
@endif

<!-- Section: Thin clients List -->
@if(count($thinclients) != 0)
    <div class="ml-5 mt-5 com-subtitle"><p>Тонкие клиенты</p></div>
    <table class="w-75 ml-5 mt-3 com-section">
        <thead>
            <tr class="d-flex mt-4 mb-4">
                <th class="col-3 text-center">Изображение</th>
                <th class="col-4">Имя</th>
                <th class="col-4">Инв. номер</th> 
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody class="m-5">
            @foreach ($thinclients as $thinclient)
                <tr class="d-flex mt-3 mb-3">
                    <td class="col-3 text-center"><img src="../img/textures/thinclient/{{$thinclient->texture}}" width="128px" height="96px"></td>
                    <td class="col-4 mt-5">{{$thinclient->name}}</td>
                    <td class="col-4 mt-5">{{$thinclient->inventarization_number}}</td>
                    <td class="col-1 mt-4 d-flex com-table-button-remake" onclick="showModal('modal_thinclient_info_{{$thinclient->id}}')">⋮</td>
                </tr>
                <!-- Modal: Info about thinclient -->
                <div id="modal_thinclient_info_{{$thinclient->id}}" class="mb-5 com-modal-window">
                    <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_thinclient_info_{{$thinclient->id}}')">⛌</div>
                    <div class="d-flex justify-content-center mt-5">
                        <div class="com-modal-section">
                            <div class="m-5">
                                <div class="d-flex">
                                    <div class="d-block col-10">
                                        <div class="w-50 ml-5 com-title"><p>{{$structure_name}}</p></div>
                                        <div class="d-flex ml-5 mt-2 pb-3 com-subtitle"><p>{{$room_name}},</p><p class="ml-5">Тонкий клиент</p></div>
                                    </div>
                                    <div class="d-flex col-2">
                                        <div class="mt-5 mb-5 mr-5 com-table-button-add" onclick="remakeThinClient('{{$thinclient->id}}')">↻</div>
                                        <br>
                                        <div class="mt-5 mb-5 mr-5 ml-3 com-table-button-remake" onclick="showModal('modal_thinclient_move_{{$thinclient->id}}')">⤭</div>
                                    </div>
                                </div>
                                <!-- Table: Info-->
                                <div class="mt-5 ml-5 mr-5">
                                    <input type="hidden" id="modal_thinclient_info_thinclientId_{{$thinclient->id}}" value="{{$thinclient->id}}">

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Общая информация</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Имя тонкого клиента</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_name_{{$thinclient->id}}" value="{{$thinclient->name}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Текстура</div>
                                            <div class="col-8 td">                                
                                                <select class="pt-2 pb-2 com-low-subtitle" id="modal_thinclient_info_texture_{{$thinclient->id}}">
                                                    @foreach ($thinclientTextures as $thinclientTexture)
                                                        @if($thinclientTexture == $thinclient->texture)
                                                            <option selected value="{{$thinclientTexture}}">{{$thinclientTexture}}</option>
                                                        @else
                                                            <option value="{{$thinclientTexture}}">{{$thinclientTexture}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Цена</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_price_{{$thinclient->id}}" value="{{$thinclient->price}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Операционная система</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_operation_system_{{$thinclient->id}}" value="{{$thinclient->operation_system}}"></div>
                                        </div>

                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Примечания</div>
                                            <div class="col-8 td"><textarea class="w-100 border-0" id="modal_thinclient_info_comment_{{$thinclient->id}}">{{$thinclient->comment}}</textarea></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Инвентаризация</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Инвентарный номер</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_inventarization_number_{{$thinclient->id}}" value="{{$thinclient->inventarization_number}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата покупки</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_buy_{{$thinclient->id}}" value="{{$thinclient->date_buy}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата начала использования</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_commisioning_begin_{{$thinclient->id}}" value="{{$thinclient->date_commisioning_begin}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата конца использования</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_commisioning_end_{{$thinclient->id}}" value="{{$thinclient->date_commisioning_end}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата списания</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_decommissioned_{{$thinclient->id}}" value="{{$thinclient->date_decommissioned}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Процессор</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Модель</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_cpu_model_{{$thinclient->id}}" value="{{$thinclient->cpu_model}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Кол-во ядер</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_cpu_count_core_{{$thinclient->id}}" value="{{$thinclient->cpu_count_core}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Частота</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_cpu_freq_{{$thinclient->id}}" value="{{$thinclient->cpu_freq}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>ОЗУ (в Гб)</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Тип</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_ram_type_{{$thinclient->id}}" value="{{$thinclient->ram_type}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Объём</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_ram_size_{{$thinclient->id}}" value="{{$thinclient->ram_size}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Объём дискового пространства (в Гб)</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Объём HDD</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_hdd_space_{{$thinclient->id}}" value="{{$thinclient->hdd_space}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Объём SSD</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_ssd_space_{{$thinclient->id}}" value="{{$thinclient->ssd_space}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Видеокарта</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Модель</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_gpu_model_{{$thinclient->id}}" value="{{$thinclient->gpu_model}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Кол-во USB разъёмов</u></p></div>
                                    <div class="com-section">                                    
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">2.0</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_usb2_count_{{$thinclient->id}}" value="{{$thinclient->usb2_count}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">3.0</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_usb3_count_{{$thinclient->id}}" value="{{$thinclient->usb3_count}}"></div>
                                        </div>
                                    </div>

                                    <br><div class="ml-5 mt-5 text-center com-subtitle"><p><u>Обслуживание</u></p></div>
                                    <div class="com-section">
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата чистки</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_lastClear_{{$thinclient->id}}" value="{{$thinclient->date_lastClear}}"></div>
                                        </div>
                                        <div class="d-flex pt-4 pb-4">
                                            <div class="col-4 td">Дата проверки</div>
                                            <div class="col-8 td"><input type="text" id="modal_thinclient_info_date_lastCheck_{{$thinclient->id}}" value="{{$thinclient->date_lastCheck}}"></div>
                                        </div>
                                    </div>
                                    <br>
                                </div>   

                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal: Transfer thinclient to room -->
                <div id="modal_thinclient_move_{{$thinclient->id}}" class="com-modal-window">
                    <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_thinclient_move_{{$thinclient->id}}')">⛌</div>
                    <div class="d-flex justify-content-center mt-5">
                        <div class="com-modal-section">
                            <div class="w-25 ml-5 mt-5 com-title"><p>Склад</p></div>
                            <div class="ml-5 mt-2 pb-3 com-subtitle"><p>Перемещение тонкого клиента</p></div>
                            <div class="d-flex ml-5 mt-5 mb-5"> 
                                <select class="w-50 pt-3 pb-3 com-low-subtitle" id="modal_thinclient_transfer_new_room_id_{{$thinclient->id}}">
                                    <option value="0">На склад</option>
                                    @foreach ($rooms as $room)
                                        @if($room->id == $thinclient->room_id)
                                            <option selected value="{{$room->id}}">{{$room->structure_name}} {{$room->room_name}}</option>
                                        @else
                                            <option value="{{$room->id}}">{{$room->structure_name}} {{$room->room_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="ml-5 com-table-button-add" onclick="transferThinClient('{{$thinclient->id}}')">↻</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endif

<!-- Scripts -->
<script>
    /* Control functions for computers */

    /**
     * Ajax computer remake and reload page
     * @param string $_id computer id
     * return location.reload
     */
    function remakeComputer(_computerId) {
        data = {
            'computer_id' : _computerId,
            'computer_name' : $('#modal_computer_info_name_' + _computerId).val(),
            'computer_texture' : $('#modal_computer_info_texture_' + _computerId).val(),
            'computer_price' : $('#modal_computer_info_price_' + _computerId).val(),
            'computer_comment' : $('#modal_computer_info_comment_' + _computerId).val(),
            'computer_date_buy' : $('#modal_computer_info_date_buy_' + _computerId).val(),
            'computer_date_commisioning_begin' : $('#modal_computer_info_date_commisioning_begin_' + _computerId).val(),
            'computer_date_commisioning_end' : $('#modal_computer_info_date_commisioning_end_' + _computerId).val(),
            'computer_date_decommissioned' : $('#modal_computer_info_date_decommissioned_' + _computerId).val(),
            'computer_inventarization_number' : $('#modal_computer_info_inventarization_number_' + _computerId).val(),
            'computer_localnetwork' : $('#modal_computer_info_localnetwork_' + _computerId).val(),
            'computer_internet' : $('#modal_computer_info_internet_' + _computerId).val(),
            'computer_domen' : $('#modal_computer_info_domen_' + _computerId).val(),
            'computer_date_lastClear' : $('#modal_computer_info_date_lastClear_' + _computerId).val(),
            'computer_date_lastChangeThermalGrease' : $('#modal_computer_info_date_lastChangeThermalGrease_' + _computerId).val(),
            'computer_date_lastCheck' : $('#modal_computer_info_date_lastCheck_' + _computerId).val(),
            'computer_case_model' : $('#modal_computer_info_case_model_' + _computerId).val(),
            'computer_case_form' : $('#modal_computer_info_case_form_' + _computerId).val(),
            'computer_board_model' : $('#modal_computer_info_board_model_' + _computerId).val(),
            'computer_board_form' : $('#modal_computer_info_board_form_' + _computerId).val(),
            'computer_board_socket' : $('#modal_computer_info_board_socket_' + _computerId).val(),
            'computer_board_bios' : $('#modal_computer_info_board_bios_' + _computerId).val(),
            'computer_cpu_model' : $('#modal_computer_info_cpu_model_' + _computerId).val(),
            'computer_cpu_socket' : $('#modal_computer_info_cpu_socket_' + _computerId).val(),
            'computer_cpu_count_cores' : $('#modal_computer_info_cpu_count_cores_' + _computerId).val(),
            'computer_cpu_count_threads' : $('#modal_computer_info_cpu_count_threads_' + _computerId).val(),
            'computer_cpu_freq' : $('#modal_computer_info_cpu_freq_' + _computerId).val(),
            'computer_cpu_tdp' : $('#modal_computer_info_cpu_tdp_' + _computerId).val(),
            'computer_cpu_max_temperature' : $('#modal_computer_info_cpu_max_temperature_' + _computerId).val(),
            'computer_cpu_integrated_gpu' : $('#modal_computer_info_cpu_integrated_gpu_' + _computerId).val(),
            'computer_cpu_architecture' : $('#modal_computer_info_cpu_architecture_' + _computerId).val(),
            'computer_ram_1' : $('#modal_computer_info_ram_1_' + _computerId).val(),
            'computer_ram_2' : $('#modal_computer_info_ram_2_' + _computerId).val(),
            'computer_ram_3' : $('#modal_computer_info_ram_3_' + _computerId).val(),
            'computer_ram_4' : $('#modal_computer_info_ram_4_' + _computerId).val(),
            'computer_disk_1' : $('#modal_computer_info_disk_1_' + _computerId).val(),
            'computer_disk_2' : $('#modal_computer_info_disk_2_' + _computerId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('computer.remake')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }

    /**
     * Ajax transfer computer and reload page
     * @param string $_id computer id
     * return location.reload
     */
    function transferComputer(_computerId) {
        data = {
            'computer_id' : _computerId,
            'room_id' : $('#modal_computer_transfer_new_room_id_' + _computerId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('computer.transfer')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }


    /* Control functions for thin clients */
    
    /**
     * Ajax thin client remake and reload page
     * @param string $_thinClientId thin client id
     * return location.reload
     */
    function remakeThinClient(_thinClientId) {
        data = {
            'thinclient_id' : _thinClientId,
            'thinclient_name' : $('#modal_thinclient_info_name_' + _thinClientId).val(),
            'thinclient_texture' : $('#modal_thinclient_info_texture_' + _thinClientId).val(),
            'thinclient_price' : $('#modal_thinclient_info_price_' + _thinClientId).val(),
            'thinclient_comment' : $('#modal_thinclient_info_comment_' + _thinClientId).val(),
            'thinclient_date_buy' : $('#modal_thinclient_info_date_buy_' + _thinClientId).val(),
            'thinclient_date_commisioning_begin' : $('#modal_thinclient_info_date_commisioning_begin_' + _thinClientId).val(),
            'thinclient_date_commisioning_end' : $('#modal_thinclient_info_date_commisioning_end_' + _thinClientId).val(),
            'thinclient_date_decommissioned' : $('#modal_thinclient_info_date_decommissioned_' + _thinClientId).val(),
            'thinclient_inventarization_number' : $('#modal_thinclient_info_inventarization_number_' + _thinClientId).val(),
            'thinclient_operation_system' : $('#modal_thinclient_info_operation_system_' + _thinClientId).val(),
            'thinclient_cpu_model' : $('#modal_thinclient_info_cpu_model_' + _thinClientId).val(),
            'thinclient_cpu_count_core' : $('#modal_thinclient_info_cpu_count_core_' + _thinClientId).val(),
            'thinclient_cpu_freq' : $('#modal_thinclient_info_cpu_freq_' + _thinClientId).val(),
            'thinclient_ram_type' : $('#modal_thinclient_info_ram_type_' + _thinClientId).val(),
            'thinclient_ram_size' : $('#modal_thinclient_info_ram_size_' + _thinClientId).val(),
            'thinclient_hdd_space' : $('#modal_thinclient_info_hdd_space_' + _thinClientId).val(),
            'thinclient_ssd_space' : $('#modal_thinclient_info_ssd_space_' + _thinClientId).val(),
            'thinclient_gpu_model' : $('#modal_thinclient_info_gpu_model_' + _thinClientId).val(),
            'thinclient_usb2_count' : $('#modal_thinclient_info_usb2_count_' + _thinClientId).val(),
            'thinclient_usb3_count' : $('#modal_thinclient_info_usb3_count_' + _thinClientId).val(),
            'thinclient_date_lastClear' : $('#modal_thinclient_info_date_lastClear_' + _thinClientId).val(),
            'thinclient_date_lastCheck' : $('#modal_thinclient_info_date_lastCheck_' + _thinClientId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('thinclient.remake')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }

    /**
     * Ajax transfer thin client and reload page
     * @param string $_thinClientId thin client id
     * return location.reload
     */
    function transferThinClient(_thinClientId) {
        data = {
            'thinclient_id' : _thinClientId,
            'room_id' : $('#modal_thinclient_transfer_new_room_id_' + _thinClientId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('thinclient.transfer')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }
    
</script>
@endsection