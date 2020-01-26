<?php

namespace App\Http\Controllers;

use App;
use App\Computer;
use App\ThinClient;
use App\Room;
use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'computersWarehouse' => Computer::getComputersInWarehouse(),
            'computerTextures' => Computer::getComputerTextures(),
            'thinclientsWarehouse' => ThinClient::getThinClientsInWarehouse(),
            'thinclientTextures' => ThinClient::getThinClientTextures(),
            'rooms' => Room::getActiveRooms()
        ];

        return view('warehouse', $data);
    }
}
