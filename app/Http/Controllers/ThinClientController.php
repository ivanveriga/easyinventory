<?php

namespace App\Http\Controllers;

use App;
use App\ThinClient;

use Illuminate\Http\Request;

class ThinClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create new thin client
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $thinclient_name = $request->thinclient_name;

        ThinClient::createNewThinClient($thinclient_name);
    }

    /**
     * Remake thin client
     *
     * @param Request $request
     * @return void
     */
    public function remake(Request $request)
    {
        $data = [
            'thinclient_id' => $request->thinclient_id,
            'thinclient_name' => $request->thinclient_name,
            'thinclient_texture' => $request->thinclient_texture,
            'thinclient_price' => $request->thinclient_price,
            'thinclient_comment' => $request->thinclient_comment,
            'thinclient_date_buy' => $request->thinclient_date_buy,
            'thinclient_date_commisioning_begin' => $request->thinclient_date_commisioning_begin,
            'thinclient_date_commisioning_end' => $request->thinclient_date_commisioning_end,
            'thinclient_date_decommissioned' => $request->thinclient_date_decommissioned,
            'thinclient_inventarization_number' => $request->thinclient_inventarization_number,
            'thinclient_operation_system' => $request->thinclient_operation_system,
            'thinclient_cpu_model' => $request->thinclient_cpu_model,
            'thinclient_cpu_count_core' => $request->thinclient_cpu_count_core,
            'thinclient_cpu_freq' => $request->thinclient_cpu_freq,
            'thinclient_ram_type' => $request->thinclient_ram_type,
            'thinclient_ram_size' => $request->thinclient_ram_size,
            'thinclient_hdd_space' => $request->thinclient_hdd_space,
            'thinclient_ssd_space' => $request->thinclient_ssd_space,
            'thinclient_gpu_model' => $request->thinclient_gpu_model,
            'thinclient_usb2_count' => $request->thinclient_usb2_count,
            'thinclient_usb3_count' => $request->thinclient_usb3_count,
            'thinclient_date_lastClear' => $request->thinclient_date_lastClear,
            'thinclient_date_lastCheck' => $request->thinclient_date_lastCheck
        ];

        ThinClient::remakeThinClient($data);
    }

    /**
     * Transfer thin client
     *
     * @param Request $request
     * @return void
     */
    public function transfer(Request $request)
    {
        $thinclient_id = $request->thinclient_id;
        $room_id = $request->room_id;

        ThinClient::transferThinClientToRoom($thinclient_id, $room_id);
    }
}
