<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\noidung;

class ContentController extends Controller
{
    public function index()
    {
        $template = 'component.content';
        return view('layout', compact('template'));
    }

    public function indexAdmin(){
        $template = 'admin.content.index';
        $data = noidung::paginate(5);
        return view('admin.layout',compact('template','data'));
    }
}
