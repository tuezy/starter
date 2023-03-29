<?php
use Illuminate\Support\Facades\Route;
use App\Blog\Controllers\Auth\LogoutController;
use App\Blog\Controllers\Auth\LoginController;
Route::prefix("blog")
    ->name("blog.")
    ->middleware(['web'])
    ->group(function(){
        Route::get("logout", [LogoutController::class, 'logout'])->name("logout");
        Route::middleware(['guest'])
            ->group(function(){
                Route::get("login", [LoginController::class, 'showFormLogin'])->name("login");
                Route::post("login", [LoginController::class, 'authenticate']);
            });

        Route::middleware(['auth'])
            ->group(function(){


                Route::middleware(['token.confirm'])
                    ->group(function(){
                        Route::get("/login-confirm", [LoginController::class, 'showConfirmLoginTokenForm'])->name("token-login");
                        Route::post("/login-confirm", [LoginController::class, 'confirmLoginToken'])->name("token-login");
                    });

                Route::middleware(['token.login'])
                    ->group(function(){
                        Route::get("/", function(){
                            echo 'Blog of '. \Illuminate\Support\Facades\Auth::user()->email;
                        })->name("index");
                    });
            });
});