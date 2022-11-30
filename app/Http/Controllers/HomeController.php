<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SkeletonHelper;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /*
     * Get all books
     * @param Request $request
     */
    public function index(){
        $authors = authors();
        return view('author/list',compact('authors'));
    }
}
