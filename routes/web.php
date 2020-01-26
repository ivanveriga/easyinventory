<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Dashboard
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Warehouse
Route::get('/warehouse', 'WarehouseController@index')->name('warehouse');

// Settings
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/settings/texture/load', 'SettingsController@textureLoad')->name('settings.texture.load');

// Structure
Route::get('/structure', 'StructureController@index')->name('structure');
Route::post('/structure/create', 'StructureController@create')->name('structure.create');
Route::post('/structure/rename', 'StructureController@rename')->name('structure.rename');
Route::post('/structure/delete', 'StructureController@delete')->name('structure.delete');

// Rooms
Route::get('/room', 'RoomController@control')->name('room.control');
Route::get('/room/{room_id}', 'RoomController@index')->name('room');
Route::post('/room/create', 'RoomController@create')->name('room.create');
Route::post('/room/rename', 'RoomController@rename')->name('room.rename');
Route::post('/room/delete', 'RoomController@delete')->name('room.delete');

// Computer
Route::post('/computer/create', 'ComputerController@create')->name('computer.create');
Route::post('/computer/remake', 'ComputerController@remake')->name('computer.remake');
Route::post('/computer/transfer', 'ComputerController@transfer')->name('computer.transfer');

// Thin clients
Route::post('/thinclient/create', 'ThinClientController@create')->name('thinclient.create');
Route::post('/thinclient/remake', 'ThinClientController@remake')->name('thinclient.remake');
Route::post('/thinclient/transfer', 'ThinClientController@transfer')->name('thinclient.transfer');