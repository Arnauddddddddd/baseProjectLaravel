<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

Route::resource('/listings', ListingController::class)
    ->only(['index', 'create', 'store']);
Route::get('/bonjour/{prenom}/{nom?}', function ($prenom, $nom = null) {
    return 'Bonjour ' . $prenom . ' ' . $nom . '!';
});