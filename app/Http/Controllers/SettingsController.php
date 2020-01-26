<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('settings');
    }

    /**
     * Load new texture for object
     * @param Request $request
     * @return view settings
     */
    public function textureLoad(Request $request)
    {
        switch ($request->input('object_type')) 
        {
            case 'type_computer':
                $name = $_FILES['computer_texture']['name'];
                move_uploaded_file($_FILES['computer_texture']['tmp_name'], 'img/textures/computer/'.$name);
                break;

            case 'type_thinclient':
                $name = $_FILES['thinclient_texture']['name'];
                move_uploaded_file($_FILES['thinclient_texture']['tmp_name'], 'img/textures/thinclient/'.$name);
                break;
        }

        return view('settings');
    }

}
