<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;

class PagesController extends Controller
{
    public function industryProfileView($industry_id){
        return view('pages.industryProfile');
    }

    public function aboutUs(){
        return view('pages.about');
    }
}
