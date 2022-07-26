<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MainController extends Controller {
    public function index() {
        StatisticsController::siteViewed();
        return view('index');
    }
}