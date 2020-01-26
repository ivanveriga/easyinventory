<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThinClient extends Model
{
    protected $table = "thinclients";

    /**
     * Return array of thin clients in warehouse
     *
     * @return array
     */
    public static function getThinClientsInWarehouse() {
        return DB::table('thinclients')->where('flag_inWarehouse', 1)->get();
    }

    /**
     * Return count thin clients in warehouse
     *
     * @return int
     */
    public static function getThinClientsCountInWarehouse() {
        return count(DB::table('thinclients')->where('flag_inWarehouse', 1)->get());
    }

    /**
     * Return count thin clients in structure
     *
     * @param [int] $structure_id structure id
     * @return int
     */
    public static function getTninClientsCountInStructure($structure_id) {
        $count = 0;

        foreach (Room::getRoomsByStructureId($structure_id) as $rooms) {
            $count += count(ThinClient::getThinClientsByRoomId($rooms->id));
        };

        return $count;
    }

    /**
     * Append info about count thin client
     *
     * @param [array] $structures structures array
     * @return int
     */
    public static function appendTninClientsCountInfo($structures) {
        foreach ($structures as $structure) {
            $structure->thinClientsCount = ThinClient::getTninClientsCountInStructure($structure->id);
        }

        return $structures;
    }

    /**
     * Return array of thin clients by id room
     *
     * @param [int] $room_id id of room
     * @return array
     */
    public static function getThinClientsByRoomId($room_id) {
        return DB::table('thinclients')->where([
            'flag_inWarehouse' => 0,
            'room_id' => $room_id
        ])->get();
    }

    /**
     * Create new thin client
     *
     * @param [string] $thinclient_name name of new computer
     * @return void
     */
    public static function createNewThinClient($thinclient_name) {
        DB::table('thinclients')->insert(['name' => $thinclient_name]);
    }

    /**
     * Remake thin client
     *
     * @param [array] $data data about thin client
     * @return void
     */
    public static function remakeThinClient($data) {

        DB::table('thinclients')->where('id', $data['thinclient_id'])->update(
            [
                'name' => $data['thinclient_name'] ? $data['thinclient_name'] : "",
                'texture' => $data['thinclient_texture'] ? $data['thinclient_texture'] : "default.jpg",
                'price' => $data['thinclient_price'] ? $data['thinclient_price'] : "",
                'comment' => $data['thinclient_comment'] ? $data['thinclient_comment'] : "",
                'date_buy' => $data['thinclient_date_buy'] ? $data['thinclient_date_buy'] : "",
                'date_commisioning_begin' => $data['thinclient_date_commisioning_begin'] ? $data['thinclient_date_commisioning_begin'] : "",
                'date_commisioning_end' => $data['thinclient_date_commisioning_end'] ? $data['thinclient_date_commisioning_end'] : "",
                'date_decommissioned' => $data['thinclient_date_decommissioned'] ? $data['thinclient_date_decommissioned'] : "",
                'inventarization_number' => $data['thinclient_inventarization_number'] ? $data['thinclient_inventarization_number'] : "",
                'operation_system' => $data['thinclient_operation_system'] ? $data['thinclient_operation_system'] : "",
                'cpu_count_core' => $data['thinclient_cpu_count_core'] ? $data['thinclient_cpu_count_core'] : "",
                'cpu_model' => $data['thinclient_cpu_model'] ? $data['thinclient_cpu_model'] : "",
                'cpu_freq' => $data['thinclient_cpu_freq'] ? $data['thinclient_cpu_freq'] : "",
                'ram_type' => $data['thinclient_ram_type'] ? $data['thinclient_ram_type'] : "",
                'ram_size' => $data['thinclient_ram_size'] ? $data['thinclient_ram_size'] : "",
                'hdd_space' => $data['thinclient_hdd_space'] ? $data['thinclient_hdd_space'] : "",
                'ssd_space' => $data['thinclient_ssd_space'] ? $data['thinclient_ssd_space'] : "",
                'gpu_model' => $data['thinclient_gpu_model'] ? $data['thinclient_gpu_model'] : "",
                'usb2_count' => $data['thinclient_usb2_count'] ? $data['thinclient_usb2_count'] : "",
                'usb3_count' => $data['thinclient_usb3_count'] ? $data['thinclient_usb3_count'] : "",
                'date_lastClear' => $data['thinclient_date_lastClear'] ? $data['thinclient_date_lastClear'] : "",
                'date_lastCheck' => $data['thinclient_date_lastCheck'] ? $data['thinclient_date_lastCheck'] : "",
            ]
        );
    }

    /**
     * Transfer thin client to room
     *
     * @param [int] $thinclient_id thin client id
     * @param [int] $room_id new room id
     * @return void
     */
    public static function transferThinClientToRoom($computer_id, $room_id) {
        // Check for transfer to warehouse [room_id == 0]
        if($room_id == 0){
            DB::table('thinclients')->where('id', $computer_id)->update(
                [
                    'room_id' => 0,
                    'flag_inWarehouse' => 1
                ]
            );
        } else {
            DB::table('thinclients')->where('id', $computer_id)->update(
                [
                    'room_id' => $room_id,
                    'flag_inWarehouse' => 0
                ]
            );
        }
    }

    /**
     * Get array of thinclient textures
     *
     * @return void
     */
    public static function getThinClientTextures()
    {
       return scandir('img/textures/thinclient');
    }
}
