<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('structure');
    }

    /**
     * Create new structure
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $structure_name = $request->structure_name;

        App\Structure::insert($structure_name);
    }

    /**
     * Rename structure
     *
     * @param Request $request
     * @return void
     */
    public function rename(Request $request)
    {
        $structure_id = $request->structure_id;
        $structure_name = $request->structure_name;

        App\Structure::rename($structure_id, $structure_name);
    }

    /**
     * Set structure inactive
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $structure_id = $request->structure_id;

        App\Structure::setStructureInactive($structure_id);
    }
}
