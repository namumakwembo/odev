<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Reservation;
use App\Models\Reservation as ModelsReservation;
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

Route::get('/', function () {
    return view('welcome');
});


//Livewire
Route::get('/contact-us', ContactUs::class)->name('contact');
Route::get('/reservation', Reservation::class)->name('reservation');



Route::controller(PagesController::class)
    ->group(function () {

        Route::get('/about-us', 'aboutUs')->name('about-us');



       

    });


    //Blog
    Route::group(['prefix'=>'blog'],function(){
        Route::view('bartin-Nasil-bir-sehir','pages.blog1')->name('blog1');
        Route::view('/inkumu','pages.blog-inkumu')->name('blog-inkumu');
        Route::view('/amasra','pages.blog-amasra')->name('blog-amasra');
        Route::view('/bartin','pages.blog-bartin')->name('blog-bartin');
        Route::view('/program','pages.blog-program')->name('blog-program');

    });




Route::get('/dashboard', function () {

    $reservations= ModelsReservation::all();

    return view('dashboard')->with(compact('reservations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
