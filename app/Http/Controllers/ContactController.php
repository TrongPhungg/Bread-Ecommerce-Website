<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    public function index()
    {
        $template = 'component.contact';
        return view('layout', compact('template'));
    }
}
