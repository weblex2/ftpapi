<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $page = Page::all();
        return view('ftp.index', compact('page'));
    }
}
