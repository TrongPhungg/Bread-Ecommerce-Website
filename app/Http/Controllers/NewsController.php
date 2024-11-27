<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tintuc;

class NewsController extends Controller
{
    public function index()
    {
        $template = 'component.news';
        $data = tintuc::all();
        return view('layout', compact('template','data'));
    }
}
    