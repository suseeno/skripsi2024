<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\FrontendController;

//

use App\Http\Controllers\CategoryMenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BagianPegawaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
// use App\Http\Controllers\MasakanController;
// use App\Http\Controllers\PageNOtPoundController;
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
Auth::routes();
// Route::get('/', function () {
//     return view('home');
// });

//set up BACKEND
Route::get('/dasboard', [DasboardController::class, 'index'])->name('dasboard');

Route::resource('category', CategoryMenuController::class);
Route::resource('menu', MenuController::class);
Route::resource('meja', MejaController::class);
Route::resource('bagian', BagianPegawaiController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('dapur', DapurController::class);
Route::resource('banner', BannerController::class);
Route::resource('about', AboutController::class);

// set Up Route Home
//routing frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
//menampilkan data menus
Route::get('/menus', [FrontendController::class, 'menu'])->name('menu-masakan');
Route::get('/kategori/{name_category}', [
    FrontendController::class,
    'showcategory',
])->name('show.category');

//view items  cart
Route::get('/cart/{id}', [FrontendController::class, 'AddToCart'])->name(
    'add.cart'
);
Route::get('/shoping-cart', [FrontendController::class, 'getCart'])->name(
    'shoping-cart'
);

//menambah item  nenggunakan session
Route::get('/show/{id}', [FrontendController::class, 'showItem'])->name('show');
Route::get('/add{id}', [FrontendController::class, 'addone'])->name('addone');
Route::get('/reducebyone{id}', [
    FrontendController::class,
    'reducebyone',
])->name('reducebyone');
Route::get('/removeItem{id}', [FrontendController::class, 'removeItem'])->name(
    'removeItem'
);
//proses chekout
Route::get('/checkout', [FrontendController::class, 'checkout'])->name(
    'checkout'
);
