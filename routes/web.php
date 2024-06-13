<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;

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

// Default route that returns the welcome view
Route::get('/', function () {
    return view('welcome');
});

// Resourceful route for 'medicos' managed by MedicoController
Route::resource('almacen/medico', MedicoController::class);
