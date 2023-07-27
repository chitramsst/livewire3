<?php

use App\Livewire\Ai\Chat;
use App\Livewire\Dashboard;
use App\Livewire\Product\Index;
use Illuminate\Support\Facades\Route;
use App\Livewire\Product\Product;
use App\Livewire\Cart\Cart;
use App\Livewire\DragDrop;
use App\Livewire\DragDropTask;
use App\Livewire\Service\ServiceIndex;

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

//Route::get('/',Dashboard::class)->name('dashboard');
Route::get('/',Dashboard::class)->name('dashboard');
Route::get('/product',Index::class)->name('product.list');
Route::get('/product/create',Product::class)->name('product.create');
Route::get('cart',Cart::class)->name('cart');
Route::get('service',ServiceIndex::class)->name('service');
Route::get('/chat',Chat::class)->name('chat');
Route::get('/drag-and-drop',DragDrop::class)->name('drag-and-drop');
Route::get('/drag-and-drop-task',DragDropTask::class)->name('drag-and-drop-task');
