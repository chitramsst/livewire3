<?php

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Test;
use App\Livewire\Product\Product;

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

Route::get('/',Dashboard::class)->name('dashboard');
Route::get('/product',Product::class)->name('product.list');
