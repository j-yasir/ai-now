<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'category'])->name('category');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

if (app()->isLocal()) {
    Route::get('/fetch-news', function () {
        Artisan::call('news:fetch');
        return response()->json(['message' => 'News fetch triggered', 'output' => Artisan::output()]);
    });
}
