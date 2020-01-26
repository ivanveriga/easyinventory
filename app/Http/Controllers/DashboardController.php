<?php

namespace App\Http\Controllers;

use App;
use App\Computer;
use App\Room;
use App\Structure;
use App\ThinClient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $structures = Structure::getActiveStructures();
        $structures = Computer::appendComputersCountInfo($structures);
        $structures = ThinClient::appendTninClientsCountInfo($structures);

        $data = [
            'warehouseComputersCount' => Computer::getComputersCountInWarehouse(),
            'warehouseThinClientsCount' => ThinClient::getThinClientsCountInWarehouse(),
            'structures' => $structures,
            'rooms' => Room::getActiveRooms(),
        ];

        return view('dashboard', $data);
    }
}
