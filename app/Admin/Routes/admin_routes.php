<?php
use Illuminate\Support\Facades\Route;

Route::prefix("admin")
    ->name("admin.")
    ->middleware(['web'])
    ->group(function(){
        Route::get("logout", [\App\Admin\Controllers\Auth\LogoutController::class, 'logout'])->name("logout");
        Route::middleware(['guest:admins'])
            ->group(function(){
                Route::get("login", [\App\Admin\Controllers\Auth\LoginController::class, 'showFormLogin'])->name("login");
                Route::post("login", [\App\Admin\Controllers\Auth\LoginController::class, 'authenticate']);
            });

        Route::middleware(['auth:admins'])
            ->group(function(){
                Route::get("/", function(){
                    echo 'Dashboard of '. \Illuminate\Support\Facades\Auth::user()->email;
                })->name("dashboard");
            });
});