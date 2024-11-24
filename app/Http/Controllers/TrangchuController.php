<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TrangchuController extends Controller
{
    public function index()
    {
        $template = 'component.trangchu';
       return view('layout', compact('template'));
    }
}
