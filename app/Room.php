<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    public $timestamps = false;

    /**
     * Get active rooms
     * @return array array active rooms 
     */
    public static function getActiveRooms() {
        return DB::table('rooms')->where('flag_active', 1)->get();
    }

    /**
     * Get room by id
     *
     * @param [int] $room_id room id
     * @return object Room
     */
    public static function getRoomById($room_id) {
        return DB::table('rooms')->where('id', $room_id)->first();
    }

    /**
     * Get rooms by structure id
     *
     * @param [int] $structure_id structure id
     * @return array rooms
     */
    public static function getRoomsByStructureId($structure_id) {
        return DB::table('rooms')->where('structure_id', $structure_id)->get();
    }

    /**
     * Create new room
     *
     * @param [int] $structure_id structure id
     * @param [string] $structure_name name of structure
     * @param [string] $room_name name of room
     * @return void
     */
    public static function createNewRoom($structure_id, $structure_name, $room_name) {
        DB::table('rooms')->insert(
            [
                'structure_id' => $structure_id,
                'structure_name' => $structure_name,
                'room_name' => $room_name
            ]
        );
    }

    /**
     * Rename room
     *
     * @param [int] $room_id room id
     * @param [string] $room_name name of room
     * @return void
     */
    public static function renameRoom($room_id, $room_name) {
        DB::table('rooms')->where('id', $room_id)->update(['room_name' => $room_name]);
    }

    /**
     * Set room inactive
     *
     * @param [id] $room_id room id
     * @return void
     */
    public static function setRoomInactive($room_id) {
        DB::table('rooms')->where('id', $room_id)->update(['flag_active' => 0]);
    }
}
