<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

class ComputerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create new computer
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $computer_name = $request->computer_name;

        App\Computer::createNewComputer($computer_name);
    }

    /**
     * Remake computer
     *
     * @param Request $request
     * @return void
     */
    public function remake(Request $request)
    {
        $data = [
            'computer_id' => $request->computer_id,
            'computer_name' => $request->computer_name,
            'computer_texture' => $request->computer_texture,
            'computer_price' => $request->computer_price,
            'computer_comment' => $request->computer_comment,
            'computer_date_buy' => $request->computer_date_buy,
            'computer_date_commisioning_begin' => $request->computer_date_commisioning_begin,
            'computer_date_commisioning_end' => $request->computer_date_commisioning_end,
            'computer_date_decommissioned' => $request->computer_date_decommissioned,
            'computer_inventarization_number' => $request->computer_inventarization_number,
            'computer_localnetwork' => $request->computer_localnetwork,
            'computer_internet' => $request->computer_internet,
            'computer_domen' => $request->computer_domen,
            'computer_date_lastClear' => $request->computer_date_lastClear,
            'computer_date_lastChangeThermalGrease' => $request->computer_date_lastChangeThermalGrease,
            'computer_date_lastCheck' => $request->computer_date_lastCheck,
            'computer_case_model' => $request->computer_case_model,
            'computer_case_form' => $request->computer_case_form,
            'computer_board_model' => $request->computer_board_model,
            'computer_board_form' => $request->computer_board_form,
            'computer_board_socket' => $request->computer_board_socket,
            'computer_board_bios' => $request->computer_board_bios,
            'computer_cpu_model' => $request->computer_cpu_model,
            'computer_cpu_socket' => $request->computer_cpu_socket,
            'computer_cpu_count_cores' => $request->computer_cpu_count_cores,
            'computer_cpu_count_threads' => $request->computer_cpu_count_threads,
            'computer_cpu_freq' => $request->computer_cpu_freq,
            'computer_cpu_tdp' => $request->computer_cpu_tdp,
            'computer_cpu_max_temperature' => $request->computer_cpu_max_temperature,
            'computer_cpu_integrated_gpu' => $request->computer_cpu_integrated_gpu,
            'computer_cpu_architecture' => $request->computer_cpu_architecture,
            'computer_ram_1' => $request->computer_ram_1,
            'computer_ram_2' => $request->computer_ram_2,
            'computer_ram_3' => $request->computer_ram_3,
            'computer_ram_4' => $request->computer_ram_4,
            'computer_disk_1' => $request->computer_disk_1,
            'computer_disk_2' => $request->computer_disk_2
        ];

        App\Computer::remakeComputer($data);
    }

    /**
     * Transfer computer
     *
     * @param Request $request
     * @return void
     */
    public function transfer(Request $request)
    {
        $computer_id = $request->computer_id;
        $room_id = $request->room_id;

        App\Computer::transferComputerToRoom($computer_id, $room_id);
    }
}
