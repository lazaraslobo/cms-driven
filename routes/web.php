<?php

use App\Http\Controllers\ClientPageController as ClientPageControllerAlias;
use App\Http\Controllers\PagesController as PagesControllerAlias;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/{any}', function () {
    return view('admin');
})->where('any', '.*');

Route::get('/{any}', [ClientPageControllerAlias::class, 'getPageContentBySlug'])
    ->where('any', '.*');

//Route::get('/{slug}', [PagesControllerAlias::class, 'show'])->where('slug', '.*');

