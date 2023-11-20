<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewHandler;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::controller(viewHandler::class)->group(function () {
    Route::get('/', 'main');
    Route::get('/main', 'main');
    Route::get('/live', 'live');
    Route::get('/table', 'table');
    Route::get('/about', 'about');
});