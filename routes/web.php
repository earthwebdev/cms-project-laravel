<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminUsersController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SlidesController;
use App\Http\Controllers\backend\TestimonialsController;
use App\Http\Controllers\backend\TeamsController;
use App\Http\Controllers\backend\ServicesController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPagesController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [HomeController::class, 'index']);

Route::get('/team', [MainPagesController::class, 'index'])->name('frontend.team');

Route::get('/about', [MainPagesController::class, 'index'])->name('frontend.about');
Route::get('/service', [MainPagesController::class, 'index'])->name('frontend.service');


Route::get('/contact-us', [MainPagesController::class, 'index'])->name('frontend.contact');
Route::post('/contact-us', [MainPagesController::class, 'contactSubmit'])->name('frontend.contact.submit');

Route::get('/backend/login', [AdminController::class, 'getLogin'])->name('backend.login');

Route::post('/backend/login',  [AdminController::class, 'postLogin'])->name('backend.login.submit');

Route::prefix('backend')->middleware('admin_auth')->group(function () {
    Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('backend.dashboard');

    Route::resource('users', AdminUsersController::class, ['names' => 'backend.users']);
    Route::resource('pages', PagesController::class, ['names' => 'backend.pages']);
    Route::resource('slides', SlidesController::class, ['names' => 'backend.slides']);
    Route::resource('testimonials', TestimonialsController::class, ['names' => 'backend.testimonials']);

    Route::resource('teams', TeamsController::class, ['names' => 'backend.teams']);

    Route::resource('services', ServicesController::class, ['names' => 'backend.services']);

    Route::resource('settings', SettingsController::class, ['names' => 'backend.settings']);

    Route::get('logout', [ProfileController::class, 'logout'])->name('backend.logout');
});

Route::fallback([MainPagesController::class, 'notfound'])->name('frontend.notfound');
