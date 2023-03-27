<?php
use Illuminate\Support\Facades\Route;
use \App\Admin\Controllers\AuthController;

Route::prefix("admin")
    ->name("admin.")
    ->middleware(['web'])
    ->group(function(){
        Route::get("logout", [AuthController::class, 'logout'])->name("logout");
        Route::middleware(['guest:admins'])
            ->group(function(){
                Route::get("login", [AuthController::class, 'showFormLogin'])->name("login");
                Route::post("login", [AuthController::class, 'authenticate']);
            });

        Route::middleware(['auth:admins'])
            ->group(function(){
                Route::get("/", function(){
                    echo 'Dashboard of '. \Illuminate\Support\Facades\Auth::user()->email;
                })->name("dashboard");
            });
});