<?php

use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('components.content');
// });
Route::get('/', [DashboardController::class, 'index']);
Route::view('/breakdown', 'components.breakdown');
Route::view('/breakdown2', 'components.breakdown2');
Route::view('/breakdown3', 'components.breakdown3');
Route::view('/breakdown4', 'components.breakdown4');
Route::view('/breakdown5', 'components.breakdown5');
Route::view('/breakdown6', 'components.breakdown6');
Route::view('/breakdown7', 'components.breakdown7');
