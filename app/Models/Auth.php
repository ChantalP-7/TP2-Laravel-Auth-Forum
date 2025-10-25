<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
if(Auth::check()){
    $name = Auth::user()->name;
}