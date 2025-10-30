<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
if(Auth::check()){
    $username = Auth::user()->username;
}