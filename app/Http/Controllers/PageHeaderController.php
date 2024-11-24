<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageHeaderController extends Controller
{
    public function shop()
{
    return view('component.pageheader', [
        'pageTitle' => ''
    ]);
}
}
