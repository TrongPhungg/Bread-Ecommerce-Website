<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ykien;
use App\Models\khachhang;

class OpinionController extends Controller
{
    public function index(){
        $template = 'admin.opinion.index';
        $data = ykien::paginate(5);
        $dskh = khachhang::all();
        return view('admin.layout',compact('template','data','dskh'));
    }
}
