<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphController;

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
//     return view('index');
// });
Route::get('/', [GraphController::class, 'sqlMy']);
Route::post('/', [GraphController::class, 'sqlMy']);
// Route::get('/u/{value}', [GraphController::class, 'countData']);