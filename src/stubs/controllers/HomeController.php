<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function show() {
        return View::component('Home', []);
    }
}
