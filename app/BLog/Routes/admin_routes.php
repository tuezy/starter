<?php
use Illuminate\Support\Facades\Route;
use \App\Blog\Controllers\AuthController;

Route::prefix("blog")
    ->name("blog.")
    ->middleware(['web'])
    ->group(function(){
        Route::get("logout", [AuthController::class, 'logout'])->name("logout");
        Route::middleware(['guest'])
            ->group(function(){
                Route::get("login", [AuthController::class, 'showFormLogin'])->name("login");
                Route::post("login", [AuthController::class, 'authenticate']);
            });

        Route::middleware(['auth'])
            ->group(function(){


                Route::middleware(['token.confirm'])
                    ->group(function(){
                        Route::get("/login-confirm", [AuthController::class, 'showConfirmLoginTokenForm'])->name("token-login");
                        Route::post("/login-confirm", [AuthController::class, 'confirmLoginToken'])->name("token-login");
                    });

                Route::middleware(['token.login'])
                    ->group(function(){
                        Route::get("/", function(){
                            echo 'Blog of '. \Illuminate\Support\Facades\Auth::user()->email;
                        })->name("index");
                    });
            });
});