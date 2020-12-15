<?php

use App\Http\Controllers\IrrigationDashboard;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RegionMapController;
use App\Http\Controllers\RegionTerraceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserVerificationController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

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

//Route::get('/dashboard', function () {
//    return redirect(route('admin.dashboard'));
//});
//Route::get('/dashboard', [IrrigationDashboard::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('admin.dashboard');
Route::get('/', function () {
    return view('welcome');
});
//[ 'middleware' => [],'prefix'=>'admin' ]
//Route::name('admin.')->middleware(['auth:sanctum', 'verified'])->prefix('admin/')->group(function() {
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum','web', 'verified'])->group(function() {

    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

    Route::view('/dashboard', "dashboard")->name('dashboard');
//    Route::middleware(['checkRole:1']){}
//    Route::get('/user', [ UserController::class, "index" ])->name('user');
//    Route::view('/user/new', "pages.user.create")->name('user.new');
//    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::middleware(['checkRole:1'])->group(function (){
        Route::resources(
            [
                'user-verification'=> UserVerificationController::class,
            ]
        );
        Route::get('/map/{id}/create-terrace',[MapController::class,'createTerrace'])->name('map.create-terrace');
        Route::get('/map/{id}/edit-terrace',[MapController::class,'editTerrace'])->name('map.edit-terrace');
        Route::get('/map/{id}/delete-terrace',[MapController::class,'deleteTerrace'])->name('map.delete-terrace');
    });
    Route::middleware(['checkRole:1,2'])->group(function (){
        Route::resources(
            [
                'user'=>UserController::class,
                'map'=>MapController::class,
                'blog'=>BlogController::class,
                'region-map'=> RegionMapController::class,
                'region-terrace'=> RegionTerraceController::class,
            ]
        );
    });

});
