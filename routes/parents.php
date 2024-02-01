<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'prevent-back-history'], function () {
  // parents dashboard
  Route::middleware(['auth:sanctum,web', 'verified'])->get('/parents_dashboard', function () {
    return view('backend.parents_panel.dashboard.index');
})->name('parents.dashboard');
});
