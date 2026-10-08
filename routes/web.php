<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SongController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SongManageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| ログイン後のページ
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {

    // ホーム
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    // 曲検索
    Route::get('/search', [SearchController::class, 'index'])
        ->name('search');

    // 曲登録
    Route::get('/songs/create', [SongController::class, 'create'])
        ->name('songs.create');

    Route::post('/songs', [SongController::class, 'store'])
        ->name('songs.store');

    // 曲管理
    Route::get('/songs/manage', [SongManageController::class, 'index'])
        ->name('songs.manage');

    Route::get('/songs/{song}/edit', [SongManageController::class, 'edit'])
        ->name('songs.edit');

    Route::put('/songs/{song}', [SongManageController::class, 'update'])
        ->name('songs.update');

    // 歌唱履歴
    Route::get('/records', [RecordController::class, 'index'])
        ->name('records.index');

    Route::get('/records/{record}/edit', [RecordController::class, 'edit'])
        ->name('records.edit');

    Route::put('/records/{record}', [RecordController::class, 'update'])
        ->name('records.update');

    Route::delete('/records/{record}', [RecordController::class, 'destroy'])
        ->name('records.destroy');

    // ランキング
    Route::get('/ranking', [RankingController::class, 'index'])
        ->name('ranking');

    // お気に入り
    Route::get('/favorites', [FavoriteController::class, 'index'])
        ->name('favorites.index');

    Route::post('/favorites', [FavoriteController::class, 'store'])
        ->name('favorites.store');

    Route::delete('/favorites/{songId}', [FavoriteController::class, 'destroy'])
        ->name('favorites.destroy');

    // マイページ
    Route::get('/mypage', [MypageController::class, 'index'])
        ->name('mypage');
    
    Route::get('/settings', [SettingsController::class, 'index'])
    ->name('settings');

    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

    Route::get('/password/edit', function () {
    return view('password.edit');
})->name('password.edit');
});


/*
|--------------------------------------------------------------------------
| トップページ
|--------------------------------------------------------------------------
*/

// 「/」にアクセスしたらホームへ
Route::get('/', function () {
    return redirect()->route('home');
});


/*
|--------------------------------------------------------------------------
| Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';