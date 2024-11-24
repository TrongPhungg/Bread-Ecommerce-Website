<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CheckoutController extends Controller
{
    public function index()
    {
        $template = 'component.checkout';
        return view('layout', compact('template'));
    }
}
