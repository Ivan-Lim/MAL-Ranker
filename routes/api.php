<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MalController;

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::post('/mal/user-anime-list', [MalController::class, 'getUserAnimeList']);
