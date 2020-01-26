<?php

namespace App\Http\Controllers;

use App;
use App\Computer;
use App\ThinClient;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($room_id)
    {
        $room = Room::getRoomById($room_id);

        $data = [
            'structure_name' => $room->structure_name,
            'room_name' => $room->room_name,
            'rooms' => Room::getActiveRooms(),
            'computers' => Computer::getComputersByRoomId($room_id),
            'computerTextures' => Computer::getComputerTextures(),
            'thinclients' => ThinClient::getThinClientsByRoomId($room_id),
            'thinclientTextures' => ThinClient::getThinClientTextures(),
        ];

        return view('room', $data);
    }

    public function control(Request $request)
    {
        return view('room_control');
    }

    /**
     * Create new room
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $structure_id = $request->structure_id;
        $structure_name = $request->structure_name;
        $room_name = $request->room_name;

        Room::createNewRoom($structure_id, $structure_name, $room_name);
    }

    /**
     * Rename room
     *
     * @param Request $request
     * @return void
     */
    public function rename(Request $request)
    {
        $room_id = $request->room_id;
        $room_name = $request->room_name;

        Room::renameRoom($room_id, $room_name);
    }

    /**
     * Set room inactive
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $room_id = $request->room_id;

        Room::setRoomInactive($room_id);
    }

}
