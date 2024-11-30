<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chinhsach;
class PrivacyController extends Controller
{
    public function index(){
        $chinhsach = chinhsach::all();
        $template = 'component.privacy';
        return view('layout', compact('chinhsach', 'template'));
    }
}
