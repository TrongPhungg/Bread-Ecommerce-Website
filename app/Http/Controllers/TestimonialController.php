<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        $template = 'component.testimonial';
        return view('layout', compact('template'));
    }
}
