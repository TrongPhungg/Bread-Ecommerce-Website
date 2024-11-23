<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khachhang;

class CustomerController extends Controller
{
    public function index(){
        $template = 'admin.customer.index';
        $data = khachhang::all();
        $data = khachhang::paginate(5);
        return view('admin.layout',compact('template','data'));
    }
}
