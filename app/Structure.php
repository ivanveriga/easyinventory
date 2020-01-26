<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Structure extends Model
{
    public $timestamps = false;
    
    /**
     * Return array of active structures
     *
     * @return array
     */
    public static function getActiveStructures() {
        return DB::table('structures')->where('flag_active', 1)->get();
    }

    /**
     * Get structure by id
     *
     * @return object Structure
     */
    public static function getStructureById($structure_id) {
        return DB::table('structures')->where('id', $structure_id)->first();
    }

    /**
     * Create new structure
     *
     * @param [string] $structure_name structure name
     * @return void
     */
    public static function insert($structure_name) {
        DB::table('structures')->insert(['name' => $structure_name]);
    }

    /**
     * Rename structure
     *
     * @param [int] $structure_id structure id
     * @param [string] $structure_name structure name
     * @return void
     */
    public static function rename($structure_id, $structure_name) {
        DB::table('structures')->where('id', $structure_id)->update(['name' => $structure_name]);
    }

    /**
     * Set structure inactive
     *
     * @param [int] $structure_id structure id
     * @return void
     */
    public static function setStructureInactive($structure_id) {
        DB::table('structures')->where('id', $structure_id)->update(['flag_active' => 0]);
    }
}
