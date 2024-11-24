<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;

class TrangchuController extends Controller
{
    public function index()
    {
        $template = 'component.trangchu';
        $data = sanpham::all();
       return view('layout', compact('template','data'));
    }
}
