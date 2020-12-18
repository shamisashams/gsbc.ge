<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\DictionaryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\NewsController;
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
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['setlocale']
], function () {
    Route::get('/', [\App\Http\Controllers\Frontend\NewsController::class, 'index'])->name('/');

    Route::get('/media', [\App\Http\Controllers\Frontend\NewsController::class, 'getNews'])->name('media');
    Route::get('/media/single-blog/{slug}', [\App\Http\Controllers\Frontend\NewsController::class, 'getSingleNews'])->name('single-blog');



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


    Route::get('/contact', function () {
        return view('frontend.modules.contact.index');
    })->name('contact');
});


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['setlocale']
], function () {

    Route::prefix('admin')->group(function () {
        Route::middleware('loggedin')->group(function () {
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
            Route::post('login', [AuthController::class, 'login'])->name('login');
        });

        Route::middleware(['auth', 'can:isAdmin'])->group(function () {
            // Logout action if user is loggedin
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');

            Route::get('/', function () {
                return view('admin.welcome');
            })->name('adminHome');


            // Localizations
//            Route::resource('localizations', LocalizationController::class)
//                ->name('index', 'localizationIndex')
//                ->name('create', 'localizationCreateView')
//                ->name('store', 'localizationCreate')
//                ->name('edit', 'localizationEditView')
//                ->name('update', 'localizationUpdate')
//                ->name('destroy', 'localizationDestroy')
//                ->name('show', 'localizationShow');

            Route::resource('news', NewsController::class)
                ->name('index', 'news')
                ->name('create', 'createNews')
                ->name('store', 'saveNews')
                ->name('edit', 'editNews')
                ->name('show', 'showNews')
                ->name('update', 'updateNews')
                ->name('destroy', 'destroyNews');

            Route::resource('page', HomeController::class)
                ->name('index', 'page')
                ->name('store', 'savePage')
                ->name('edit', 'editPage')
                ->name('show', 'showPage')
                ->name('update', 'updatePage');
        });

    });
});







