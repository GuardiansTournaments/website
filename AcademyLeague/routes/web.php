<?php

use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamInviteController;
use App\Http\Controllers\TeamController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * Only for guests
 */
Route::group(['middleware' => 'auth'], function () {

    /**
     * Only for hosts & admins
     */
    Route::group(['middleware' => 'is_host'], function () {
        // Tournament cud
        Route::post('/tournament', [TournamentController::class, 'store'])->name('tournament.store');
        Route::get('/tournament/create', [TournamentController::class, 'create'])->name('tournament.create');
        Route::get('/tournament/{tournament}/edit', [TournamentController::class, 'edit'])->name('tournament.edit');
        Route::put('/tournament/{tournament}', [TournamentController::class, 'update'])->name('tournament.update');
        Route::delete('/tournament/{tournament}', [TournamentController::class, 'delete'])->name('tournament.delete');
    });

    /**
     * Only for admins
     */
    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('game', App\Http\Controllers\GameContoller::class);
        Route::get('/impersonate/{id}', [App\Http\Controllers\UserController::class, 'impersonate']);
    });

    /**
     * Other
     */
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{team}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::get('teaminvite/{team}', [TeamInviteController::class, 'generatetoken'])->name('teaminvite.generatetoken');
    Route::post('teaminvite/accept', [TeamInviteController::class, 'accept'])->name('teaminvite.accept');


    /**
     * For everyone
     */
    Route::get('/tournament/{tournament}', [TournamentController::class, 'show'])->name('tournament.show');
    Route::get('/tournament', [TournamentController::class, 'index'])->name('tournament.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/{team}', [TeamController::class, 'show'])->name('team.show');
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/createoverview', [TeamController::class, 'createOverview'])->name('team.createOverview');
});

Route::get('/sign-in/discord', [DiscordController::class, 'redirectToProvider'])->name('discord.login');
Route::get('/sign-in/discord/redirect', [DiscordController::class, 'handleProviderCallback']);
