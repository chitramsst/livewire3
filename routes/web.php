<?php

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product\Index;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',Dashboard::class);
Route::group(['prefix'=>'products'],function(){
  Route::get('/',Index::class);
});