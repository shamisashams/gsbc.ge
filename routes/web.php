<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\DictionaryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Dictionary;
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
#Frontend Routes
Route::get('/', function () {
    return view('frontend.modules.home.index');
});

Route::get('/about-us', function () {
    return view('frontend.modules.about-us.index');
})->name('about-us');

Route::get('/membership', function () {
    return view('frontend.modules.membership.index');
})->name('membership');

Route::get('/regulations', function () {
    return view('frontend.modules.membership.regulations.index');
})->name('regulations');

Route::get('/events', function () {
    return view('frontend.modules.events.index');
})->name('events');

Route::get('/projects', function () {
    return view('frontend.modules.projects.tourism.index');
})->name('projects');

Route::get('/media', function () {
    return view('frontend.modules.media.index');
})->name('media');


Route::get('/media/single-blog', function () {
    return view('frontend.modules.media.single-blog.index');
})->name('single-blog');

Route::get('/contact', function () {
    return view('frontend.modules.contact.index');
})->name('contact');




