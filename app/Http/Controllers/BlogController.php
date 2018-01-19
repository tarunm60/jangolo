<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getBlog(Request $request)
    {
    	return view('articles.blog_list');
    }

    public function blogDetail(Request $request,$id)
    {
    	return view('articles.blog_detail');
    }
}
