<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function index()
    {
        $template = 'component.contact';
        return view('layout', compact('template'));
    }
    public function send(Request $request)
    {
        try 
        {
            Mail::to('nguynbao756@gmail.com')->queue(new ContactMail($request->all()));
            return redirect()->back()->with('contact_success', 'Đã gửi thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('contact_error', 'Gửi thất bại');
        }
    }
}
