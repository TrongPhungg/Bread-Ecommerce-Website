<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sanpham;
use App\Models\loaisanpham;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $template = 'component.shop';
        $data = sanpham::all();
        $data = sanpham::paginate(6);
        $dmsp = loaisanpham::all();
        return view('layout', compact('template','data','dmsp'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $template ='component.shop';
        if(empty($request))
            $data = sanpham::paginate(5);
        else
        {
        $data = sanpham::where('Tensanpham','like','%'.$query.'%')
                        ->orWhere('IDLoaisanpham','like','%'.$query.'%')
                        ->get();
                    }
        return response()->json(['data'=>$data]);
    }

    
}
