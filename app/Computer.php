<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Computer extends Model
{
    protected $table = "computers";

    /**
     * Return array of computers in warehouse
     *
     * @return array
     */
    public static function getComputersInWarehouse() {
        return DB::table('computers')->where('flag_inWarehouse', 1)->get();
    }
    
    /**
     * Return count computers in warehouse
     *
     * @return int
     */
    public static function getComputersCountInWarehouse() {
        return count(DB::table('computers')->where('flag_inWarehouse', 1)->get());
    }

    /**
     * Return count computers in structure
     *
     * @param [int] $structure_id structure id
     * @return int
     */
    public static function getComputersCountInStructure($structure_id) {
        $count = 0;

        foreach (Room::getRoomsByStructureId($structure_id) as $rooms) {
            $count = $count + count(Computer::getComputersByRoomId($rooms->id));
        };

        return $count;
    }

    /**
     * Append info about count computers
     *
     * @param [array] $structures structures array
     * @return int
     */
    public static function appendComputersCountInfo($structures) {
        foreach ($structures as $structure) {
           $structure->computersCount = Computer::getComputersCountInStructure($structure->id);
        }

        return $structures;
    }

    /**
     * Return array of computers by room id
     *
     * @param [int] $room_id id of room
     * @return array
     */
    public static function getComputersByRoomId($room_id) {
        return DB::table('computers')->where([
            'flag_inWarehouse' => 0,
            'room_id' => $room_id
        ])->get();
    }


    /**
     * Create new computer
     *
     * @param [string] $computer_name name of new computer
     * @return void
     */
    public static function createNewComputer($computer_name) {
        DB::table('computers')->insert(['name' => $computer_name]);
    }

    /**
     * Remake computer
     *
     * @param [array] $data data about computer
     * @return void
     */
    public static function remakeComputer($data) {

        DB::table('computers')->where('id', $data['computer_id'])->update(
            [
                'name' => $data['computer_name'] ? $data['computer_name'] : "",
                'texture' => $data['computer_texture'] ? $data['computer_texture'] : "default.jpg",
                'price' => $data['computer_price'] ? $data['computer_price'] : "",
                'comment' => $data['computer_comment'] ? $data['computer_comment'] : "",
                'date_buy' => $data['computer_date_buy'] ? $data['computer_date_buy'] : "",
                'date_commisioning_begin' => $data['computer_date_commisioning_begin'] ? $data['computer_date_commisioning_begin'] : "",
                'date_commisioning_end' => $data['computer_date_commisioning_end'] ? $data['computer_date_commisioning_end'] : "",
                'date_decommissioned' => $data['computer_date_decommissioned'] ? $data['computer_date_decommissioned'] : "",
                'inventarization_number' => $data['computer_inventarization_number'] ? $data['computer_inventarization_number'] : "",
                'localnetwork' => $data['computer_localnetwork'] ? $data['computer_localnetwork'] : "",
                'internet' => $data['computer_internet'] ? $data['computer_internet'] : "",
                'domen' => $data['computer_domen'] ? $data['computer_domen'] : "",
                'date_lastClear' => $data['computer_date_lastClear'] ? $data['computer_date_lastClear'] : "",
                'date_lastChangeThermalGrease' => $data['computer_date_lastChangeThermalGrease'] ? $data['computer_date_lastChangeThermalGrease'] : "",
                'date_lastCheck' => $data['computer_date_lastCheck'] ? $data['computer_date_lastCheck'] : "",
                'case_model' => $data['computer_case_model'] ? $data['computer_case_model'] : "",
                'case_form' => $data['computer_case_form'] ? $data['computer_case_form'] : "",
                'board_model' => $data['computer_board_model'] ? $data['computer_board_model'] : "",
                'board_form' => $data['computer_board_form'] ? $data['computer_board_form'] : "",
                'board_socket' => $data['computer_board_socket'] ? $data['computer_board_socket'] : "",
                'board_bios' => $data['computer_board_bios'] ? $data['computer_board_bios'] : "",
                'cpu_model' => $data['computer_cpu_model'] ? $data['computer_cpu_model'] : "",
                'cpu_socket' => $data['computer_cpu_socket'] ? $data['computer_cpu_socket'] : "",
                'cpu_count_cores' => $data['computer_cpu_count_cores'] ? $data['computer_cpu_count_cores'] : "",
                'cpu_count_threads' => $data['computer_cpu_count_threads'] ? $data['computer_cpu_count_threads'] : "",
                'cpu_freq' => $data['computer_cpu_freq'] ? $data['computer_cpu_freq'] : "",
                'cpu_tdp' => $data['computer_cpu_tdp'] ? $data['computer_cpu_tdp'] : "",
                'cpu_max_temperature' => $data['computer_cpu_max_temperature'] ? $data['computer_cpu_max_temperature'] : "",
                'cpu_integrated_gpu' => $data['computer_cpu_integrated_gpu'] ? $data['computer_cpu_integrated_gpu'] : "",
                'cpu_architecture' => $data['computer_cpu_architecture'] ? $data['computer_cpu_architecture'] : "",
                'ram_1' => $data['computer_ram_1'] ? $data['computer_ram_1'] : "",
                'ram_2' => $data['computer_ram_2'] ? $data['computer_ram_2'] : "",
                'ram_3' => $data['computer_ram_3'] ? $data['computer_ram_3'] : "",
                'ram_4' => $data['computer_ram_4'] ? $data['computer_ram_4'] : "",
                'disk_1' => $data['computer_disk_1'] ? $data['computer_disk_1'] : "",
                'disk_2' => $data['computer_disk_2'] ? $data['computer_disk_2'] : ""
            ]
        );
    }

    /**
     * Transfer computer to room
     *
     * @param [int] $computer_id computer id
     * @param [int] $room_id new room id
     * @return void
     */
    public static function transferComputerToRoom($computer_id, $room_id) {
        // Check for transfer to warehouse [room_id == 0]
        if($room_id == 0){
            DB::table('computers')->where('id', $computer_id)->update(
                [
                    'room_id' => 0,
                    'flag_inWarehouse' => 1
                ]
            );
        } else {
            DB::table('computers')->where('id', $computer_id)->update(
                [
                    'room_id' => $room_id,
                    'flag_inWarehouse' => 0
                ]
            );
        }
    }

    /**
     * Get array of computer textures
     *
     * @return void
     */
    public static function getComputerTextures()
    {
       return scandir('img/textures/computer');
    }
}
