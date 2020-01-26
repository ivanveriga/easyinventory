@extends('layouts.app')

@section ('content')

<!-- Title -->
<div class="w-25 ml-5 mt-5 com-title"><p>Подразделения</p></div>

<!-- Section: Structures List -->
<div class="ml-5 mt-5 com-subtitle"><p>Список подразделений</p></div>
<table class="w-75 ml-5 mt-3 com-section">
    <thead>
        <tr class="d-flex mt-4 mb-4"> <th class="col-3 text-center">#</th> <th class="col-6">Имя</th> <th class="col-3"></th> </tr>
    </thead>
    <tbody class="m-5">
        @foreach ($structuresActive as $structure)
            <tr class="d-flex mt-3 mb-3">
                <form>
                    <td class="col-3 text-center">{{ $structure->id }}</td>
                    <td class="col-6"><input class="w-100" type="text" id="structure_name_{{ $structure->id }}" value="{{ $structure->name }}"></td>
                    <td class="col-3 d-flex">
                        <div class="mr-3 ml-3 com-table-button-add" onclick="renameStructure('{{ $structure->id }}')">↻</div>
                        <div class="mr-3 ml-3 com-table-button-delete" onclick="deleteStructure('{{ $structure->id }}')">⛌</div>
                    </td>
                </form>
            </tr>
        @endforeach
        <tr><td colspan="3"><div class="com-table-big-button pt-4 pb-4" onclick="showModal('modal_addStructure')">Добавить подразделение</div></td></tr>
    </tbody>
</table>

<!-- Modal: For create new structure -->
<div id="modal_addStructure" class="com-modal-window">
    <div class="text-right mt-5 mr-5 mb-5 com-modal-close" onclick="hideModal('modal_addStructure')">⛌</div>
    <div class="d-flex justify-content-center mt-5">
        <div class="com-modal-section">
            <div class="w-75 ml-5 mt-5 com-title"><p>Добавить новое подразделение</p></div>
            <div class="d-flex ml-5 mt-5 mb-5">
                <input class="w-25 mr-5" type="text" id="modal_addStructure_name" placeholder="Имя нового подразделения"> 
                <div class="ml-5 mb-3 com-table-button-add" onclick="createStructure()">↻</div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>

    /**
     * Ajax create new structure and reload page
     * @param string $_id structure id
     * return location.reload
     */
    function createStructure() {
        data = {
            'structure_name' : $('#modal_addStructure_name').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('structure.create')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }
    
    /**
     * Ajax structure rename and reload page
     * @param string $_id structure id
     * return location.reload
     */
    function renameStructure(_structureId) {
        data = {
            'structure_id' : _structureId,
            'structure_name' : $('#structure_name_' + _structureId).val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('structure.rename')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }

    /**
     * Ajax structure delete and reload page
     * @param string $_id structure id
     * return location.reload
     */
    function deleteStructure(_structureId) {
        data = {
            'structure_id' : _structureId,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: "{{route('structure.delete')}}",
            data: data,
            success: function() {
                location.reload()
            }
        })
    }
    
</script>

@endsection