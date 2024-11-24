<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopdetailController extends Controller
{
    public function index()
    {
        $template = 'component.shopdetail';
        return view('layout', compact('template'));
    }
}
