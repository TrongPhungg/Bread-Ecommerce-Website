<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loaisanpham;

class CategoryController extends Controller
{
    public function index(){
        $template = 'admin.category.index';
        $data = loaisanpham::paginate(5);
        return view("admin.layout",compact('template','data'));
    }
}
