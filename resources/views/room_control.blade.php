@extends('layouts.app')

@section ('content')

<!-- Title -->
<div class="w-25 ml-5 mt-5 com-title"><p>Помещения</p></div>

<!-- Section: Rooms List -->
@foreach ($structuresActive as $structure)
    <div class="ml-5 mt-5 com-subtitle"><p>{{ $structure->name }}</p></div>
    <table class="w-75 ml-5 mt-3 com-section">
        <thead>
            <tr class="d-flex mt-4 mb-4"> <th class="col-3 text-center">#</th> <th class="col-6">Имя</th> <th class="col-3"></th> </tr>
        </thead>
        <tbody class="m-5">
            @foreach ($roomsActive as $room)
                @if($room->structure_id == $structure->id)
                    <tr class="d-flex mt-3 mb-3">
                        <form>
                            <td class="col-3 text-center">{{ $room->id }}</td>
                            <td class="col-6"><input class="w-100" type="text" id="room_name_{{ $room->id }}" value="{{ $room->room_name }}"></td>
                            <td class="col-3 d-flex">
                                <div class="mr-3 ml-3 com-table-button-add" onclick="renameRoom('{{ $room->id }}')">↻</div>
                                <div class="mr-3 ml-3 com-table-button-delete" onclick="deleteRoom('{{ $room->id }}')">⛌</div>
                            </td>
                        </form>
                    </tr>
                @endif
            @endforeach
            <tr><td colspan="3"><div class="com-table-big-button pt-4 pb-4" onclick="showModal('modal_addRoom_{{$structure->id}}')">Добавить помещение</div></td></tr>

            <!-- Modal: For create new room -->
            <div id="modal_addRoom_{{$structure->id}}" class="com-modal-window">
                <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_addRoom_{{$structure->id}}')">⛌</div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="com-modal-section">
                    <div class="w-75 ml-5 mt-5 com-title"><p>{{$structure->name}}</p></div>
                    <div class="w-75 ml-5 mt-3 com-subtitle"><p>Добавить новое помещение</p></div>
                        <div class="d-flex ml-5 mt-5 mb-5">
                            <input type="hidden" id="modal_addRoom_structureId_{{$structure->id}}" value="{{$structure->id}}"> 
                            <input type="hidden" id="modal_addRoom_structureName_{{$structure->id}}" value="{{$structure->name}}">
                            <input class="w-25 mr-5" type="text" id="modal_addRoom_roomName_{{$structure->id}}" placeholder="Имя нового помещения">
                            <div class="ml-5 mb-3 com-table-button-add" onclick="createRoom('{{$structure->id}}')">↻</div>
                        </div>
                    </div>
                </div>
            </div>
        </tbody>
    </table>
    <br><br><br><br><br>
@endforeach



<!-- Scripts -->
<script>

    /**
     * Ajax room creater and reload page
     * @param string $_structureId structure id
     * return location.reload
     */
    function createRoom(_structureId) {
        data = {
            'structure_id' : $('#modal_addRoom_structureId_' + _structureId).val(),
            'structure_name' : $('#modal_addRoom_structureName_' + _structureId).val(),
            'room_name' : $('#modal_addRoom_roomName_' + _structureId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('room.create')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }
    
    /**
     * Ajax room rename and reload page
     * @param string $_roomId room id
     * return location.reload
     */
    function renameRoom(_roomId) {
        data = {
            'room_id' : _roomId,
            'room_name' : $('#room_name_' + _roomId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('room.rename')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }

    /**
     * Ajax room delete and reload page
     * @param string $_roomId room id
     * return location.reload
     */
    function deleteRoom(_roomId) {
        data = {
            'room_id' : _roomId,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('room.delete')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }
    
</script>

@endsection