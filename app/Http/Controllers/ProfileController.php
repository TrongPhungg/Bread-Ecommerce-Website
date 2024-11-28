<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $template = 'component.customer';
        $khachhang = Khachhang::where('IDKhachhang', $user->IDKhachhang)->first();
        return view('layout', compact('user', 'khachhang', 'template'));
    }
}
