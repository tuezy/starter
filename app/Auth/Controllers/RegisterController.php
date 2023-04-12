<?php

namespace App\Auth\Controllers;


abstract class RegisterController extends Authentication
{
    public abstract function guard();

}