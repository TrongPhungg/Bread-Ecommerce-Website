<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chitietdonhang;
use App\Models\sanpham;

class CartController extends Controller
{
    public function index()
    {
        $template = 'component.cart';
        $data = chitietdonhang::all();
        $dssp = sanpham::all();
        return view('layout', compact('template','data'));
    }

    
}
