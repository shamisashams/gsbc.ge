<?php


use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\EventController;
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
    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('/');

    Route::get('/media', [\App\Http\Controllers\Frontend\NewsController::class, 'getNews'])->name('media');
    Route::get('/media/single-blog/{slug}', [\App\Http\Controllers\Frontend\NewsController::class, 'getSingleNews'])->name('single-blog');

    Route::get('/membership', [\App\Http\Controllers\Frontend\MemberController::class, 'getMembers'])->name('membership');
    Route::get('/change-localization', [\App\Http\Controllers\Frontend\HomeController::class, 'changeLocalization'])->name('changeLocalization');

    Route::get('/getEvents', [\App\Http\Controllers\Frontend\EventController::class, 'getEvents'])->name('getEvents');
    Route::get('/about-us', [\App\Http\Controllers\Frontend\AboutUsController::class, 'index'])->name('about-us');


    Route::get('/regulations', function () {
        return view('frontend.modules.membership.regulations.index');
    })->name('regulations');

    Route::get('/events', function () {
        return view('frontend.modules.events.index');
    })->name('events');

    Route::get('/projects', function () {
        return view('frontend.modules.projects.tourism.index');
    })->name('projects');

    Route::get('/biography', function () {
        return view('frontend.modules.projects.tourism.index');
    })->name('biography');

    Route::prefix('projects')->group(function () {
        Route::get('/agriculture', function () {
            return view('frontend.modules.projects.agriculture.index');
        })->name('agriculture');

        Route::get('/real-estate', function () {
            return view('frontend.modules.projects.real-estate.index');
        })->name('realestate');

        Route::get('/renewable-energy', function () {
            return view('frontend.modules.projects.renewable-energy.index');
        })->name('renewableenergy');

        Route::get('/construction', function () {
            return view('frontend.modules.projects.construction.index');
        })->name('construction');

        Route::get('/logistics', function () {
            return view('frontend.modules.projects.logistics.index');
        })->name('logistics');

    });


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
            })->name('cleanAdminHome');


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

            Route::resource('members', MemberController::class)
                ->name('index', 'member')
                ->name('create', 'createMember')
                ->name('store', 'saveMember')
                ->name('edit', 'editMember')
                ->name('show', 'showMember')
                ->name('update', 'updateMember')
                ->name('destroy', 'destroyMember');


            Route::resource('events', EventController::class)
                ->name('index', 'adminEvent')
                ->name('create', 'createEvent')
                ->name('store', 'saveEvent')
                ->name('edit', 'editEvent')
                ->name('show', 'showEvent')
                ->name('update', 'updateEvent')
                ->name('destroy', 'destroyEvent');

            Route::resource('banners', BannerController::class)
                ->except(['create', 'delete', 'store'])
                ->name('index', 'banner')
                ->name('edit', 'editBanner')
                ->name('update', 'updateBanner');


            Route::get('/home', [HomeController::class, 'index'])->name('adminHome');
            Route::get('/home/{id}/edit', [HomeController::class, 'edit'])->name('editHome');
            Route::put('/home/{id}', [HomeController::class, 'update'])->name('updateHome');
        });

    });
});







