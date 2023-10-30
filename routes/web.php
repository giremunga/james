<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\WorkshopsController;
use App\View\Components\markdown;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Homecontroller::class, 'show']);


Route::get('/workshops', [WorkshopsController::class, 'show']);

// routes/web.php



Route::get('/markdown', function () {
    return view('components.markdown', [
        'markdownContent' => (new markdown())->markdownContent,
    ]);
});

