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
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['setlocale']
], function () {
    Route::get('/', function () {
        return view('welcome');
    });

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
            Route::resource('localizations', LocalizationController::class)
                ->name('index', 'localizationIndex')
                ->name('create', 'localizationCreateView')
                ->name('store', 'localizationCreate')
                ->name('edit', 'localizationEditView')
                ->name('update', 'localizationUpdate')
                ->name('destroy', 'localizationDestroy')
                ->name('show', 'localizationShow');

            // Features
            Route::resource('features', FeatureController::class)
                ->name('index', 'featureIndex')
                ->name('create', 'featureCreateView')
                ->name('store', 'featureCreate')
                ->name('edit', 'featureEditView')
                ->name('update', 'featureUpdate')
                ->name('destroy', 'featureDestroy')
                ->name('show', 'featureShow');

            // Language
            Route::resource('languages', DictionaryController::class)
                ->name('index', 'DictionaryIndex')
                ->name('store', 'DictionaryStore')
                ->name('create', 'DictionaryCreate')
                ->name('show', 'DictionaryShow')
                ->name('edit', 'DictionaryEdit')
                ->name('update', 'DictionaryUpdate')
                ->name('destroy', 'DictionaryDestroy');

            Route::resource('answers', AnswerController::class)
                ->name('index', 'AnswerIndex')
                ->name('store', 'AnswerStore')
                ->name('show', 'AnswerShow')
                ->name('create', 'AnswerCreate')
                ->name('edit', 'AnswerEdit')
                ->name('update', 'AnswerUpdate')
                ->name('destroy', 'AnswerDestroy');

            // Products
            Route::resource('products', ProductController::class)
                ->name('index', 'productIndex')
                ->name('create', 'productCreateView')
                ->name('store', 'productCreate')
                ->name('edit', 'productEditView')
                ->name('update', 'productUpdate')
                ->name('destroy', 'productDestroy')
                ->name('show', 'productShow');

            // Users
            Route::resource('users',UserController::class)
                ->name('index', 'userIndex')
                ->name('create', 'userCreateView')
                ->name('store', 'userCreate')
                ->name('edit', 'userEditView')
                ->name('update', 'userUpdate')
                ->name('destroy', 'userDestroy')
                ->name('show', 'userShow');
        });

    });
});

