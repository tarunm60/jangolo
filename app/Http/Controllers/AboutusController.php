<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    //
    public function about()
    {
    	return view('farm.about_us');
    }

    public function termCondition()
    {
    	return view('articles.term_condition');
    }

    public function getFaq()
    {
    	return view('articles.faq');
    }
}
